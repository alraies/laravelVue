<template>
    <li class="list-group-item d-flex justify-content-between w-50">

        <span >{{
            answer.content
        }}</span>
        <span class=" ml-3" @click="removeItem()">{{
           answer.perc | formatNumber
        }} % - {{answer.count}} results </span>
    </li>
</template>

<script>
import Vue from 'vue';
 var numeral = require("numeral");

  Vue.filter("formatNumber", function (value) {
    return numeral(value).format("0,0");
  });
export default {
    props: ["answer"],
    methods: {
        updateCheck() {
            axios
                .put(`api/answer/${this.answer.id}`, {
                    answer: this.answer
                })
                .then(res => {
                    if (res.status == 200) {
                        this.$emit("itemchanged");
                    }
                })
                .catch(error => {
                    console.log("error from axios put", errors);
                });
        },
        removeItem() {
            axios
                .delete(`api/answer/${this.answer.id}`)
                .then(res => {
                    if (res.status == 200) {
                        this.$emit("itemchanged");
                    }
                })
                .catch(error => {
                    console.log("error from axios delte ", error);
                });
        }
    }
};
</script>

<style>
.completed {
    text-decoration: line-through;
    color: gray;
}
.item {
    word-break: break-all;
}
</style>
