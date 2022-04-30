<template>
 <v-form>
    <v-container>
      <v-row class="flex-center">


            <v-col
          cols="12"
          sm="6"
          md="3"
        >

          <v-text-field
            label="username"
            v-model="answer.username"
          ></v-text-field>

        </v-col>
            <v-container
    class="px-0"
    fluid
  >
  <v-card class="justify-center"
  elevation="1"

>
<v-card-title class="justify-center">
        <h2>Add New Answer</h2>

</v-card-title>
<div class="flex-center">
 <v-radio-group  row v-model="answer.content" >
      <v-radio  :lookups="lookups"
      color="black"
        v-for="lookup in lookups"
        :key="lookup.id"
        :label="lookup.content"
        :value="lookup.id"
      ></v-radio>
    </v-radio-group>
</div>
   <v-card-actions class="justify-center">
       <v-btn
  elevation="2"
  dark
        @click="addanswer()"


>Submit</v-btn>

   </v-card-actions>
</v-card>

  </v-container>



      </v-row>
    </v-container>
          </v-form>
</template>
<script>

export default {
data: function(){
    return{
        answer:{
            content:"",
            username:""
        }
    }
},
props:['lookups'],
methods:{
    addanswer(){
if(this.answer.content==''&&this.answer.username==''){
    return;
}
axios.post('http://quiz.test/api/answer/store',{

    answer:this.answer
})
.then(response =>{
    if(response.status === 201){
        this.answer.content=="";
        this.answer.username=="";
        this.$emit("reloadlist");
    }
})
.catch(error=>{
    console.log(error);
})
    }
}
}
</script>
<style scoped>
.add-answer{
    display: flex;
    justify-content: center;
    align-items: center;
}
.input{
    background: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
}
.plus{
    font-size: 20px;
}
.active{
    color: #00ce25;
}
.inactive{
    color: #9999;
}
.flex-center {
  display: flex;
  flex-direction: column;
  align-items: center;
  }
</style>
