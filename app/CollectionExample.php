<?php


namespace App;


use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CollectionExample
{

    public function example()
    {
//        return collect([
//            ['name' => 'book', 'amount' => 5, 'price' => 10, 'active'  => true],
//            ['name' => 'shoe', 'amount' => 10,'price' => 5,  'active' => false],
//            ['name' => 'car',  'amount' => 15,'price' => 3,  'active' => true]
//        ])->average(function ($value){
//            if($value['active'])
//            return $value['amount'] * $value['price'];
//        });
//        return collect([
//            ['name' => 'book', 'amount' => 5, 'price' => 10, 'active'  => true],
//            ['name' => 'shoe', 'amount' => 10,'price' => 5,  'active' => false],
//            ['name' => 'car',  'amount' => 15,'price' => 3,  'active' => true]
//        ])->median('amount');
//        $array = [
//            [1,2,3],
//            [4,5,6]
//        ];
//        return collect($array)->collapse()->average();
//        $array = [1,2,3,4,5,6,7,8];
//        return collect($array)->chunk(4)->collapse()->chunk(4);
//        $key = ['name', 'age', 'gender'];
//        $value = [
//            ['first_name' => 'nguyen', 'last_name' => 'huy'],
//            29,
//            'male'];
//       return collect($key)->combine($value);
//        return collect([1,2])->concat([3]);
//        return collect([1,2,3,4])->contains(function ($value, $key){
//            return $value > 1;
//        });
//        return collect(['gtx-750', 'rx-570'])->crossJoin(['2GB', '4GB']);
//        return collect(['name' => 'huy', 'age' => 29, 'gender' => 'male'])->diffKeys(['names' => 'nghia', 'age' => 22, 'gender' => 'male']);
//        return collect([4, 5, 6, 7, 8, 9])->diffUsing([4, 5, 6, 7], function($a, $b){
//     return $a === $b  ? 0 : -1;
//   return -1;
//    });
//        $a = collect();
//        return [collect([1, 2, 3])->tap(function ($collection) use(&$a){
//            $a = $collection->prepend(4);
//        })->reverse(), $a];
//        return collect(['age' => 29, 'name' => 'huy'])->mapWithKeys(function ($value, $key){
//           return [
//            $key => $value,
//            $key.'_upper' => is_numeric($value) ? $value + 10 :  Str::upper($value)
//           ];
//        });
//        return collect(['huy', 'hoang', 'nghia'])->mapInto(person::class)
//            ->map(function ($value){
//               return $value->getFullName();
//            });
//        $collection = collect([
//            ['product' => 'egg', 'price' => 10],
//            ['product' => 'sugar', 'price' => 15],
//            ['product' => 'egg', 'price' => 20],
//            ['product' => 'sugar', 'price' => 5],
//            ['product' => 'salt', 'price' => 5],
//        ]);
//        return $collection->mapToDictionary(function($item){
//            return [$item['product'] => $item['price']];
//        });
//        $newCollection = $collection->mapToGroups(function($item){
//            return [$item['product'] => $item['price']];
//        })->map(function ($value, $key){
//            return $value->min();
//        });
//        $collection = collect([
//            ['product' => 'egg', 'price' => 10],
//            ['product' => 'sugar', 'price' => 15],
//            ['product' => 'egg', 'price' => 20],
//            ['product' => 'sugar', 'price' => 5],
//            ['product' => 'salt', 'price' => 5],
//        ]);
//        return $collection->whereStrict('price', '5.0000    ');
//        return [$collection, $newCollection];
//        return $collection->whereNotInStrict('price', [10.000, '  20 ']);
//        return collect([
//             new User(),
//            new Collection([1, 2, 3]),
//            new User()
//        ])->whereInstanceOf(Collection::class);
//        $arrays =  [[1, 2, 3], [4, 5, 6], 'test', [8,9], ['concannet']];
//        return collect([1,2,3])->nth(2);
//        return $this->arrayMerge([1, 2, 3], [4, 5, 6], 'test', [8,9], ['concannet'], 'test2');
//    return $this->everyThree([1, 2, 3, 4], collect([5, 6, 7,8]));
//        return Collection::wrap([1, 2, 3, 4])->filter(function ($item){
//            return $item < 2;
//        });
//        return Collection::wrap([
//            ['product' => 'egg', 'price' => 10, 'quantity' => 200],
//            ['product' => 'sugar', 'price' => 15, 'quantity' => 100],
//            ['product' => 'salt', 'price' => 20, 'quantity' => 300],
//            ['product' => 'shoe', 'price' => 5, 'quantity' => 500],
//            ['product' => 'meat', 'price' => 5, 'quantity' => 800],
//        ])->mapWithKeys(function ($item){
//          return  [$item['quantity'] => collect($item)->only(['product', 'price'])];
//        });
//        return collect([
//            ['product' => 'egg', 'price' => null],
//            ['product' => 'sugar', 'price' => null],
//            ['product' => 'egg', 'price' => 20],
//            ['product' => 'sugar', 'price' => 5],
//            ['product' => 'salt', 'price' => 5],
//        ])->firstWhere('price', null);
//        return collect([
//            1, 2, 3, 4 ,5
//        ])->dump()
//            ->map(function ($item){
//           return $item * 5;
//        })->dump()->reverse()->dump()->mapWithKeys(function ($item, $key){
//            return [$item + $key => $item * $key];
//        });
//        return collect(['name','age','gender'])->zip(['huy', 29, 'male'], ['nguyen', 30, 'man'], ['le', '31']);
//        return collect(["D-12", "A-23", "A0-2", "D-44" ])->sort(function ($a, $b){
//            $aCode = str_replace('-', '', $a );
//            $bCode = str_replace('-', '', $b );
//            return ($aCode < $bCode) ? -1 : 1;
//        });
//        return collect([
//            ['product' => 'egg', 'price' => null, 'code' => "D2-0"],
//            ['product' => 'sugar', 'price' => null, 'code' => "F3-0"],
//            ['product' => 'potatoe', 'price' => 20, 'code' => "D-10"],
//            ['product' => 'lemon', 'price' => 5, 'code' => "A-10"],
//            ['product' => 'pepper', 'price' => 15, 'code' => "A-20"],
//        ])->sortBy('code');
//        return collect([
//             ['product' => 'egg', 'price' => null, 'code' => "D2-0"],
//             ['product' => 'egg', 'price' => null, 'code' => "D 20"],
//             ['product' => 'potatoe', 'price' => 20, 'code' => "D-10"],
//             ['product' => 'potatoe', 'price' => 5, 'code' => "A-10"],
//             ['product' => 'pepper', 'price' => 15, 'code' => "A10"],
//        ])->groupBy(function ($item){
//            return str_replace(['-', ' '], '', $item['code']);
//        });
//        return collect([
//            ['product' => 'egg', 'price' => null, 'code' => "D2-0"],
//            ['product' => 'egg', 'price' => null, 'code' => "D 20"],
//            ['product' => 'potatoe', 'price' => 20, 'code' => "D-10"],
//            ['product' => 'potatoe', 'price' => 5, 'code' => "A-10"],
//            ['product' => 'pepper', 'price' => 20, 'code' => "A10"],
//        ])->first(function ($item){
//            return $item['price'] == 100;
//        }, 500);
//        return collect([
//            ['product' => 'egg', 'price' => null, 'code' => "D2-0"],
//            ['product' => 'egg', 'price' => null, 'code' => "D 20"],
//            ['product' => 'potatoe', 'price' => 20, 'code' => "D-10"],
//            ['product' => 'potatoe', 'price' => 5, 'code' => "A-10"],
//            ['product' => 'pepper', 'price' => 20, 'code' => "A10"],
//        ])->last(function ($item){
//            return $item['price'] > 900 && $item['price'] < 6;
//        }, 500);
//        return collect([''])->isNotEmpty();
//        return collect([1, 2, 3])->skip(2)->take(1);
//        return collect(['product' => 'egg', 'price' => null, 'code' => "D2-0"])->only(null);
//        $data = [
//            ['banana', 20, 'VietNam'],
//            ['apple', 10, 'USA'],
//            ['coconut', 50, 'Japan'],
//        ];
//         collect($data)->eachSpread(function ($product, $qty, $location){
//            dump("There are $qty $product in $location");
//        });
//         return $data;
//        return collect(['a', 2, 'd', 4, 'f', 6])->chunk(3);
//        return collect([
//            ['a', 2, 'd'],
//            [ 4, 'f', 6]
//        ])->collapse();
//        return collect([
//            ['banana', 20, 'VietNam'],
//            ['apple', 10, 'USA'],
//            ['coconut', 50, 'Japan'],
//        ])->toJson(JSON_PRETTY_PRINT);
        return collect([
            ['banana', 20, 'VietNam'],
           collect([1, 2,3]),
            ['coconut', 50, 'Japan'],
        ])->all();
    }

//    public function arrayMerge(...$arrays){
//       return collect($arrays)->flatMap(function($item){
//           return Arr::wrap(Collection::unwrap($item)) ;
//        })->all();
//
//    }

    public function everyThree(...$collections)
    {
        return collect($collections)->flatMap(function ($item) {
            return Collection::wrap($item)->nth(3);
        });

    }


}

class person
{
    public $firstName;
    public $lastName;

    public function __construct($firstName)
    {
        $this->firstName = $firstName;
        $this->lastName = Str::random(5);
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
