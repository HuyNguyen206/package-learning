<template>
<div>
    <p v-for="comment in comments" :key="comment.id">{{comment.comment}}</p>
</div>
</template>

<script>
export default {
    name: "PostComments",
    props:['postId'],
    data() {
        return {
            comments: []
        }
    },
    created() {
        axios.get(`/get-comment/posts/${this.postId}`)
            .then(res => {
                console.log(res)
            this.comments = res.data
            })
    }
}
</script>

<style scoped>

</style>
