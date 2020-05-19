<template>
  <div>
    <ul id="example-1">
      <li v-for="food in foods" :key="food.id">{{ food.name }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "App",

  data() {
    return {
      foods: []
    };
  },
  mounted() {
    this.getBasicInfo();
  },
  methods: {
    getBasicInfo() {
      axios
        .get("/api/food")
        .then(response => {
          console.log(response.data);
          this.foods = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>

<style scoped>
