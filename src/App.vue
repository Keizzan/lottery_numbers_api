// ##############################################################################
// #######             PROJECT NAME : Vue Random Numbers                  #######
// ##############################################################################
//                                Synopsis:
//  Simple front end for displaying numbers provided by api.php

<template>
  <div class="container">
    <form @submit.prevent="pullingNumbers">
      <div class="row justify-content-center">
        <div class="col-sm-2 col-md-2 col-xs-12">
          <div class="form-group">
            <label>&nbsp;</label>
            <input
              type="text"
              class="form-control"
              value="Lucky Numbers"
              disabled
            />
          </div>
        </div>
        <div class="col-sm-1 col-md-1 col-xs-12">
          <div class="form-group">
            <label>&nbsp;</label>
          </div>
        </div>

        <div class="col-sm-1 col-md-1 col-xs-12">
          <div class="form-group">
            <label>1st</label>
            <input
              type="text"
              class="form-control"
              v-model="numbers[0]"
              disabled
            />
          </div>
        </div>
        <div class="col-sm-1 col-md-1 col-xs-12">
          <div class="form-group">
            <label>2nd</label>
            <input
              type="text"
              class="form-control"
              v-model="numbers[1]"
              disabled
            />
          </div>
        </div>
        <div class="col-sm-1 col-md-1 col-xs-12">
          <div class="form-group">
            <label>3rd</label>
            <input
              type="text"
              class="form-control"
              v-model="numbers[2]"
              disabled
            />
          </div>
        </div>
        <div class="col-sm-1 col-md-1 col-xs-12">
          <div class="form-group">
            <label>4th</label>
            <input
              type="text"
              class="form-control"
              v-model="numbers[3]"
              disabled
            />
          </div>
        </div>
        <div class="col-sm-1 col-md-1 col-xs-12">
          <div class="form-group">
            <label>5th</label>
            <input
              type="text"
              class="form-control"
              v-model="numbers[4]"
              disabled
            />
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-6">
          <button type="submit" class="btn btn-primary">
            Get Your Lucky Numbers
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      numbers: ""
    };
  },

  methods: {
    // fetch method to php API and get JSON format output
    pullingNumbers() {
      fetch("http://localhost/api.php")
        .then((response) => {
          if (response.ok) {
            return response.json();
          }
        })
        // iterate through json and assign them to variable 'numbers'
        .then((data) => {
          const newNumber = [];
          for (let i in data) {
            newNumber.push(data[i]);
          }
          this.numbers = newNumber;
        })
        // log in console any errors
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

button {
  margin-top: 2rem;
}
</style>
