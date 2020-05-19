<template>
  <div>
    <button v-on:click.prevent="sortFood(foodArray, 'stock', true)">Sort Stock Low High</button>

    <button v-on:click.prevent="sortFood(foodArray, 'stock', false)">Sort Stock High Low</button>

    <button v-on:click.prevent="sortFood(foodArray, 'name', true)">Alphabetical acb</button>

    <button v-on:click.prevent="sortFood(foodArray, 'name', false)">Alphabetical cba</button>
  </div>
</template>

<script>
export default {
  props: {
    name: String,
    foodArray: Array
  },
  methods: {
    sortFood(arr, prop, asc) {
      let foodArr = arr;
      foodArr.sort(this.getSortOrderCombo(prop, asc));
    },
    getSortOrderCombo(prop, asc) {
      return function(a, b) {
        if (asc) {
          if (a[prop] > b[prop]) {
            return 1;
          } else if (a[prop] > b[prop]) {
            return -1;
          }
        } else {
          if (a[prop] < b[prop]) {
            return 1;
          } else if (a[prop] < b[prop]) {
            return -1;
          }
        }
        return 0;
      };
    }
  }
};
</script>

<style>
</style>