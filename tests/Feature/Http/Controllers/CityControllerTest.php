<?php

namespace Tests\Feature\Http\Controllers;

use App\City;
use App\Events\NewCity;
use App\Jobs\SyncMedia;
use App\Notification\ReviewNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Queue;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CityController
 */
class CityControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('city.create'));

        $response->assertOk();
        $response->assertViewIs('city.create');
    }


    /**
     * @test
     */
    public function index_displays_view()
    {
        $cities = factory(City::class, 3)->create();

        $response = $this->get(route('city.index'));

        $response->assertOk();
        $response->assertViewIs('city.index');
        $response->assertViewHas('cities');
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $city = factory(City::class)->create();

        $response = $this->get(route('city.show', $city));

        $response->assertOk();
        $response->assertViewIs('city.show');
        $response->assertViewHas('city');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CityController::class,
            'store',
            \App\Http\Requests\CityStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $content = $this->faker->paragraphs(3, true);

        Notification::fake();
        Queue::fake();
        Event::fake();

        $response = $this->post(route('city.store'), [
            'title' => $title,
            'content' => $content,
        ]);

        $cities = City::query()
            ->where('title', $title)
            ->where('content', $content)
            ->get();
        $this->assertCount(1, $cities);
        $city = $cities->first();

        $response->assertRedirect(route('city.index'));
        $response->assertSessionHas('city.title', $city->title);

        Notification::assertSentTo($city->user, ReviewNotification::class, function ($notification) use ($city) {
            return $notification->city->is($city);
        });
        Queue::assertPushed(SyncMedia::class, function ($job) use ($city) {
            return $job->city->is($city);
        });
        Event::assertDispatched(NewCity::class, function ($event) use ($city) {
            return $event->city->is($city);
        });
    }
}
