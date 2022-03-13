<template>
    <div class="container pt-4">
      <HeaderImageComponent :cityName="$route.params.cityname"/>
      <div class="row">
        <div class="col-md-12">
          <select class="custom-select my-3" @change="handleChange">
            <option value="">Choose Type of Place ...</option>
            <option value="10000">Arts and Entertainment</option>
            <option value="13000">Dining and Drinking</option>
            <option value="15000">Health and Medicine</option>
            <option value="16000">Landmarks and Outdoors</option>
            <option value="18000">Sports and Recreation</option>
            <option value="19000">Travel and Transportation</option>
          </select>
        </div>
      </div>
      <div class="row" v-if="placeType !== ''" >
          <b-col md="6" class="my-1">
            <b-form-group
              label="Search"
              label-for="filter-input"
              label-cols-sm="3"
              label-size="sm"
              class="mb-0"
            >
              <b-input-group size="sm">
                <b-form-input
                  id="filter-input"
                  v-model="filter"
                  type="search"
                  placeholder="Type to Search"
                ></b-form-input>

                <b-input-group-append>
                  <b-button :disabled="!filter" @click="filter = ''" variant="primary">Clear</b-button>
                </b-input-group-append>
              </b-input-group>
            </b-form-group>
          </b-col>
          <b-col md="6" class="my-1">
            <b-pagination
              align="fill"
              v-model="currentPage"
              :total-rows="totalRows"
              :per-page="perPage"
            ></b-pagination>
          </b-col>
          <b-table class="my-4" striped hover small @filtered="onFiltered" :filter="filter" :busy.sync="isBusy" :items="places" :per-page="perPage" :current-page="currentPage" :fields="fields" responsive>
            <template #cell(website)="data">
              <span v-html="data.value">
              </span>
            </template>
          </b-table>
      </div>
    </div>
</template>

<script>
import HeaderImageComponent from "../components/HeaderImageComponent.vue";
export default {
  name : 'CityDetailsView',
  created(){
    if(this.id === undefined)
    {
      if(this.$route.params.cityname == "Tokyo"){
        this.id = 1;
      }
      if(this.$route.params.cityname == "Yokohama"){
        this.id = 2;
      }
      if(this.$route.params.cityname == "Kyoto"){
        this.id = 3;
      }
      if(this.$route.params.cityname == "Sapporo"){
        this.id = 4;
      }
      if(this.$route.params.cityname == "Nagoya"){
        this.id = 5;
      }
    }
  },
  props : {
    id : Number
  },
  components : {
    HeaderImageComponent
  },
  data(){
    return {
      busy : false,
      placeType : '',
      places : [],
      currentPage: 1,
      perPage : 5,
      totalRows : 1,
      filter : null,
      fields: [
        {
          key: 'category_name',
          label: 'Category',
          headerTitle : 'Category',
          sortable: true
        },
        {
          key: 'place_name',
          label: 'Place Name',
          headerTitle : 'Place Name',
          sortable: true
        },
        {
          key: 'address',
          label: 'Address',
          headerTitle : 'Address',
          sortable: true,
        },
        {
          key: 'contact',
          label: 'Contact Number',
          headerTitle : 'Contact Number',
          sortable: true,
        },
        {
          key: 'email',
          label: 'Email',
          headerTitle : 'Email',
          sortable: true,
          formatter : (value) => {
            if(value == "")
            {
              return "Not Available"
            }
            return value;
          }
        },
        {
          key: 'website',
          label: 'Website',
          headerTitle : 'Website',
          sortable: true,
          formatter : (value) => {
            if(value == "")
            {
              return "Not Available"
            }
            return value;
          }
        }
      ],
    };
  },
  computed: {
    rows() {
      return this.places.length;
    }
  },
  methods : {
    async handleChange(e){
      this.placeType = e.target.value;
      if(e.target.value !== ""){
        this.isBusy = true;
        let myHeaders = new Headers();
        let requestOptions = {
            method: 'GET',
            headers: myHeaders,
        };
        let response = await fetch(`${process.env.MIX_API_BASE_URL}${this.id}/places/${e.target.value}`, requestOptions);
        let data = await response.json();
        this.isBusy = false;
        this.places = data.data;
        this.totalRows = data.data.length
      }
    },
    onFiltered(filteredItems) {
      this.totalRows = filteredItems.length
      this.currentPage = 1
    }
  }
}
</script>

<style>

</style>