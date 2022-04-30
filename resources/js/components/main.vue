<template>
   <div  class="container w-100 m-auto text-center mt-3">
            <h1 class="text-danger">How do you find our service ?</h1>
            <v-card>
           <i-answer-Form
            :lookups="lookups"
             v-on:reloadlist="getList()"/>
            </v-card>
<i-list-view :answers="answers"
         v-on:reloadlist="getList()"
            class="text-center"
            />
   </div>
</template>
<script>
import Vue from 'vue'
import answerForm from './answerForm.vue'
import listView from './ListView.vue'
Vue.component('i-answer-Form',answerForm)
Vue.component('i-list-view',listView)

export default {
cmoponints:{
 'i-answer-Form' : answerForm,
 'i-list-view' : listView,


},
data:function(){
    return{
        answers:[],
        lookups:[]
    }
},
methods:{
getList(){
    axios
    .get('http://quiz.test/api/answers')
    .then(response =>{
        this.answers=response.data
    })
    .catch(console.error())
},
getlookup(){
    axios
    .get('http://quiz.test/api/lookups')
    .then(response =>{
        this.lookups=response.data
    })
    .catch(console.error())
},
 created(){
     this.getList();
this.getlookup();
 },
beforeCreate(){this.getlookup();this.getList();}
},
mounted: function () {
  this.$nextTick(function () {
      this.getList();
this.getlookup();
  })
}
}

</script>
<style scoped>
.answersContainer{
    width: 350px;
    margin: auto;
}
.heading{
    background: #e6e6e6;
    padding: 10px;
}
#title{
    text-align: center;
}
</style>
