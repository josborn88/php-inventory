
<template>
  <div id="food-div">

    <hr class="div-seperator">

    <div id="inventory">
      <h1>Food Inventory</h1>

      <sortingButtons name='Ducky' :foodArray=filteredList></sortingButtons>

      <div class="food-nav-buttons">
        <button class="btn">
          <a href="#add-food">Jump To Add</a>
        </button>
        <button class="btn">
          <a href="#update-food">Jump To Update</a>
        </button>
        <button class="btn">
          <a href="#delete-food">Jump To Delete</a>
        </button>
      </div>
      <div class="select-block">
        <label>Select Catagory:</label>

        <select v-model="categoryFilter">
          <option value="View All">View All</option>

          <option v-for="category in foodCategories" :value="category">{{category}}</option>
        </select>
      </div>
      
      <div id="food-table"></div>

      <tr id="inventory-header">
        <th>Name</th>

        <th>Stock</th>

        <th>Unit</th>

        <th>Calories Per Unit</th>

        <th>Total Calories</th>
      </tr>

      <tr
        v-for="food in filteredList"
        :key="food.id"
        v-bind:class="{even: tableRow % 2 == 0}"
        :set="tableRow++"
      >
        <td>{{ food.name }}</td>

        <td>{{ food.stock }}</td>

        <td>{{ food.unit }}</td>

        <td>{{ food.calories_per_unit }}</td>

        <td>{{ food.calories_per_unit * food.stock}}</td>
      </tr>
    </div>

    <hr class="div-seperator">
    
    <div id="add-food">
      <h1>Add New Food</h1>
      <div class="food-nav-buttons">
        <button class="btn">
          <a href="#inventory">Jump To Inventory</a>
        </button>
        <button class="btn">
          <a href="#update-food">Jump To Update</a>
        </button>
        <button class="btn">
          <a href="#delete-food">Jump To Delete</a>
        </button>
      </div>
      <div class="fm-data">
        <label for="name" class="fm-label">Name of Food:</label>
        <input type="text" id="name" class="fm-txt report" v-model="newFood.name" required />
      </div>

      <div class="fm-data">
        <label for="unit" class="fm-label">Unit of Food:</label>
        <input type="text" id="unit" class="fm-txt report" v-model="newFood.unit" required />
      </div>

      <div class="fm-data">
        <label for="calories_per_unit" class="fm-label">Calories per Unit:</label>
        <input
          type="number"
          id="calories_per_unit"
          class="fm-txt report"
          v-model="newFood.calories_per_unit"
          required
        />
      </div>

      <div class="fm-data">
        <label for="stock" class="fm-label">Stock of units:</label>
        <input type="number" id="stock" class="fm-txt report" v-model="newFood.stock" required />
      </div>

      <div class="fm-data">
        <label for="categories" class="fm-label">Categories of Food (seperate with commas):</label>
        <input type="text" id="categories" class="fm-txt report" v-model="newFood.categories" />
      </div>
    </div>

    <div class="btn-block">
      <button v-on:click.prevent="addFood(newFood)" class="btn">Submit</button>
    </div>

    <hr class="div-seperator">

    <div id="update-food">
      <h1>Update a Food</h1>
      <div class="food-nav-buttons">
        <button class="btn">
          <a href="#inventory">Jump To Inventory</a>
        </button>
        <button class="btn">
          <a href="#add-food">Jump To Add</a>
        </button>
        <button class="btn">
          <a href="#delete-food">Jump To Delete</a>
        </button>
      </div>

      <div class="select-block">
        <div>
          <label>Select food:</label>

          <select v-model="foodToUpdate">
            <option value="View All">View All</option>

            <option v-for="food in foods" :key="food.id" :value="food">{{food.name}}</option>
          </select>
        </div>
      </div>

      <div class="fm-data">
        <label for="name" class="fm-label">Name of Food:</label>
        <input type="text" id="name" class="fm-txt report" v-model="foodToUpdate.name" required />
      </div>

      <div class="fm-data">
        <label for="unit" class="fm-label">Unit of Food:</label>
        <input type="text" id="unit" class="fm-txt report" v-model="foodToUpdate.unit" required />
      </div>

      <div class="fm-data">
        <label for="calories_per_unit" class="fm-label">Calories per Unit:</label>
        <input
          type="number"
          id="calories_per_unit"
          class="fm-txt report"
          v-model="foodToUpdate.calories_per_unit"
          required
        />
      </div>

      <div class="fm-data">
        <label for="stock" class="fm-label">Stock of units:</label>
        <input type="number" id="stock" class="fm-txt report" v-model="foodToUpdate.stock" required />
      </div>

      <div class="fm-data">
        <label for="categories" class="fm-label">Categories of Food (seperate with commas):</label>
        <input type="text" id="categories" class="fm-txt report" v-model="foodToUpdate.categories" />
      </div>
    </div>

    <div class="btn-block">
      <button v-on:click.prevent="updateFood(foodToUpdate)" class="btn">Submit</button>
    </div>

    <hr class="div-seperator">

    <div id="delete-food">
      <h1>Delete food</h1>
      <div class="food-nav-buttons">
        <button class="btn">
          <a href="#inventory">Jump To Inventory</a>
        </button>
        <button class="btn">
          <a href="#add-food">Jump To Add</a>
        </button>
        <button class="btn">
          <a href="#update-food">Jump To Update</a>
        </button>
      </div>

      <div class="select-block">
        <select v-model="foodToDelete">
          <option v-for="food in foods" :key="food.id" :value="food.id">{{food.name}}</option>
        </select>
      </div>

      <div class="btn-block">
        <button v-on:click.prevent="deleteFood(foodToDelete)" class="btn">Submit</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import sortingButtons from '../components/sortingButtons.vue';

export default {
  name: "App",
  components: {
    sortingButtons
 
  },

  data() {
    return {
      tableRow: 0,
      foods: [],
      newFood: {
        name: "",
        stock: 0,
        unit: "",
        calories_per_unit: 0,
        categories: ""
      },
      categoryFilter: "View All",
      allCategories: [],
      foodToUpdate: {},
      foodToDelete: 0
    };
  },
  mounted() {
    this.getBasicInfo();
  },
  methods: {
    clearNewFood() {
      this.newFood.name = "";
      this.newFood.stock = 0;
      this.newFood.unit = "";
      this.newFood.calories_per_unit = 0;
      this.newFood.categories = "";
    },
    getBasicInfo() {
      axios
        .get("/api/food")
        .then(response => {
          this.foods = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    addFood(newFood) {
      axios;
      axios
        .post("/api/food", newFood)
        .then(res => {
          res.data;
          this.clearNewFood();
          this.getBasicInfo();
        })
        .catch(err => {
          console.log(err);
        });
    },
    updateFood(food) {
      axios;
      axios
        .put(`/api/updatefood/${food.id}`, food)
        .then(res => {
          res.data;
          this.clearNewFood();
          this.getBasicInfo();
        })
        .catch(err => {
          console.log(err);
        });
    },
    deleteFood(id) {
      axios.delete(`/api/food/${id}`);
      getBasicInfo();
    },
    onChildClick(value) {
      this.fromChild = value;
    }
  },
  computed: {
    filteredList(vm) {
      let filteredLst = vm.foods;

      if (vm.categoryFilter != "View All") {
        filteredLst = filteredLst.filter(food =>
          food.categories.includes(vm.categoryFilter)
        );
      }
      return filteredLst;
    },
    foodCategories(vm) {
      let categroyString = "";

      vm.foods.forEach(element => {
        categroyString += element.categories.trim() + ",";
      });
      categroyString = categroyString.substring(0, categroyString.length - 1);

      let categoryArray = categroyString.split(",");

      for (var i = 0; i < categoryArray.length; i++) {
        categoryArray[i] = categoryArray[i].trim();
      }

      return [...new Set(categoryArray)];
    }
  }
};
</script>

<style scoped>
h1  {
  padding-bottom: 1rem;
  text-align: center;
}

hr {
  border: 10px solid blueviolet;
  border-radius: 2px;
  }

th {
  padding-right: 3rem;
}

tr {
  padding-top: 2rem;
}

.even {
  background-color: #abf2ff;
}

.food-nav-buttons {
  padding-bottom: 1rem;
}

.select-block {
  padding-bottom: 2rem;
}


</style>
