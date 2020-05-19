<template>
  <div>
    <button>You clicked me {{ count }} times.</button>

    <label for="child-input">Child input:</label>
    <input id="child-input" type="text" name="msg" v-model="childMessage" />
     <button v-on:click.prevent='emitToParent'>subbie.</button>
  </div>
</template>

<script>
export default {
  props: {
    count: ""
  },
  data: {
    childMessage: "blank"
  },
  methods: {
    // Define the method that emits data to the parent as the first parameter to `$emit()`.
    // This is referenced in the <template> call in the parent. The second parameter is the payload.
    emitToParent(event) {
      this.$emit("childToParent", this.childMessage);
    }
  }
};
</script>

<style>
</style>


