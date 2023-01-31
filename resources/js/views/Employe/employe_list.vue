<script>
import axios from "axios";
import navbarVue from "../layout/navbar.vue";
import pagination from "laravel-vue-pagination";
import { employeService } from "../../services";
export default {
  components: { pagination, navbarVue },
    data() {
        return {
            search: "",
            employe: null,
            employeCount: 0,
            paginations: {},
            page: 0,
            record: 5,
            status:"",
            limit: 2,
            fields: [
                {
                    key: "name",
                    label: "Name",
                    sortable: true,
                },
                {
                    key: "email",
                    label: "Email",
                    sortable: true,
                },
                {
                    key: "action",
                    label: "Action",
                    sortable: false,
                },
                {
                    key: 'status',
                    label: 'Status',
                    sortable:false,
                },
                {
                    key: 'date_time',
                    label: 'Date Time',
                    sortable:false,
                }
            ],
            loading: false,
        };
    },
    methods: {
      getEmploye(page) {
            this.loading = true;
            var filters = {
                search: this.search,
                record: this.record,
                page: page && page > 0 ? page : 1,
                status: this.status,
            };
            this.page = filters.page;
            employeService.getEmploye(filters).then((response) => {
                this.loading = false;
                this.paginations = response.data.result
                this.employe = response.data.result.data;
                this.employeCount = response.data.result.total;
            });
        },
        activeInactiveEmploye(status , id){
            if(confirm('Are you sure you want to change Employee status?')){
                var data = {id: id, status: status}
                employeService.activeInactiveEmploye(data).then((response) => {
                if (response.data.code === 200) {
                    Vue.toasted.success(response.data.message,{
                        duration: 2000
                    });
                    this.getEmploye(this.page);
                } else {
                    Vue.toasted.error(response.data.message,{
                        duration: 2000
                    });
                }
                });
            }
        },
        deleteEmploye(id){
            if(confirm('Are you sure you want to delete Employe?' )){
                employeService.deleteEmploye({ id:id }).then((response) => {
                    if (response.data.code === 200) {
                        Vue.toasted.success(response.data.message,{
                            duration: 2000
                        });
                        this.getEmploye(this.page);
                    } else {
                        Vue.toasted.error(response.data.message,{
                            duration: 2000
                        });
                    }
                });
            }
        },
        
    },
    mounted() {
        this.getEmploye();
    },
};
</script>

<template>
    <div>
        <navbarVue />
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="employe">
                        <h2>{{ trans.get('__JSON__.Employe List') }} ({{employeCount}})</h2>
                        <router-link :to="{ name: 'employe/add' }" class="btn btn-success">
                            <i class="mdi mdi-plus mr-1"></i> {{ trans.get('__JSON__.Add Employe') }}</router-link
                        >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-main-list vendor-table table-responsive">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="date-range-list">
                                    <label> {{ trans.get('__JSON__.Show record')}} :</label>
                                    <div class="position-relative">
                                        <select v-model="record" @change="getEmploye()" name="status" id="status" class="form-control">
                                            <option disabled>{{ trans.get('__JSON__.Select number')}}</option>
                                            <option value="5">05</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="150">150</option>
                                            <option value="250">250</option>
                                            <option value="1000">1000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="date-range-list">
                                    <label>{{trans.get('__JSON__.Searc')}} :</label>
                                    <div class="position-relative">
                                        <input
                                            type="text"
                                            class="form-control"
                                            @input="getEmploye()"
                                            v-model="search"
                                            :placeholder="trans.trans('__JSON__.Searc...')"
                                        />
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="date-range-list">
                                    <label>{{ trans.get('__JSON__.Status') }} :</label>
                                    <div class="position-relative">
                                        <select v-model="status" @change="getEmploye()" name="status" id="status" class="form-control">
                                            <option value="">{{trans.get('__JSON__.Select Status') }}</option>
                                            <option value="1">{{ trans.get("__JSON__.Active") }}</option>
                                            <option value="0">{{ trans.get("__JSON__.Inactive") }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <b-table
                        striped
                        hover
                        :items="employe"
                        :fields="fields"
                        :no-local-sorting="false"
                        :busy="loading"
                        show-empty
                    >
                        <template #table-busy>
                            <div class="text-center text-danger my-2">
                                <b-spinner class="align-middle"></b-spinner>
                                <strong>{{ trans.get('__JSON__.Loading...') }}</strong>
                            </div>
                        </template>
    
                        <template v-slot:cell(name)="data">
                            <h6>
                                <div>{{ data.item.name }}</div>
                            </h6>
                        </template>
    
                        <template v-slot:cell(email)="data">
                            <h6>
                                <div>{{ data.item.email }}</div>
                            </h6>
                        </template>
                        <template v-slot:cell(status)="data">
                            <button
                              v-if="data.item.status == '0'"
                              type="submit"
                              class="badge-danger badge"
                              @click="activeInactiveEmploye(1,data.item.id)"
                            >{{ trans.get("__JSON__.Inactive") }}</button>
                            <button
                              v-if="data.item.status == '1'"
                              type="submit"
                              class="badge-success badge"
                              @click="activeInactiveEmploye(0,data.item.id)"
                            >{{ trans.get("__JSON__.Active") }}</button>
                        </template>
                        <template v-slot:cell(action)="data">
                            <div>
                                <router-link :to="{name:'/employe/edit', params: { employeId: data.item.id }}" class="badge-success badge" >{{ trans.get('__JSON__.Edit') }}</router-link>
                                <button type="button" class="badge-danger badge" @click="deleteEmploye(data.item.id)"> {{ trans.get('__JSON__.Delete') }}</button>
                            </div>
                        </template>
                        <template v-slot:cell(date_time)="data">
                            <div>
                                <label for="">{{data.item.date_time}}</label>
                            </div>
                        </template>
    
                        <template #empty>
                            <p class="text-center"> {{ trans.get('__JSON__.No Employe Found') }} </p>
                        </template>
                    </b-table>
                </div>
                <div class="col-md-12">
                  <div>
                    <!-- pagination -->
                    <pagination
                    :data="paginations"
                    :limit="limit"
                    @pagination-change-page="getEmploye"
                  ></pagination>
                  </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.employe {
    display: flex;
    position: relative;
    justify-content: space-between;
}
</style>
