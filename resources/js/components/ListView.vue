<template>
    <div class="mt-4">
        <h4>Answers Statistics</h4>
        <hr class="w-50 m-auto mb-3" />
        <ul class="list-group m-auto">
            <list-item
                :answer="answer"
                v-on:itemchanged="$emit('reloadlist')"
                v-for="answer in answers"
                :key="answer.id"
                class="m-auto my-1 text-justify text-wrap"
            />
        </ul>
    </div>
</template>
<script>
import listItem from './ListItem.vue'
export default {
components:{
    listItem
},
props:['answers'],

}
</script>
<style scoped>

</style>
