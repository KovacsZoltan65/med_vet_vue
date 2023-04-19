<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Office Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <!--<a href="#">Home</a>-->
                                <HomeLink />
                            </li>
                            <router-link :to="{name: 'Offices'}">Offices</router-link>
                            <li class="breadcrumb-item active">Edit Office Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Office</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" 
                                data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" 
                                data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <form @submit.prevent="save">
                    <div class="card-body">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" id="id" name="id" v-model="office.id"/>

                        <!-- NAME -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                       id="name" name="name" placeholder="Name" 
                                       aria-describedby="span_name" v-model="office.name">
                                <span id="span_name" name="span_name" 
                                      class="help-block invalid-feedback" 
                                      style="display: block;">
                                </span>
                            </div>
                        </div>

                        <!-- TYPES -->
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                
                                <select v-model="office.type_id" class="form-control">
                                    <option v-for="(type, key) in office_types" 
                                            :key="key"
                                            v-bind:value="type.id"
                                            :selected="office.type_id"
                                    >{{ type.name }}</option>
                                </select>

                                <span id="span_type" name="span_type" 
                                      class="help-block invalid-feedback"
                                      style="display: block;"></span>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <router-link to="/offices" 
                                     class="btn btn-info" 
                                     @click="save">
                            <i class="fas fa-save"></i>
                        </router-link>
                        <router-link to="/offices" 
                                     class="btn btn-default float-right">
                            <i class="fas fa-door-open"></i>
                        </router-link>
                    </div>
                    <!-- /.card-footer-->
                </form>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
</template>

<script>
import { useRoute } from 'vue-router';
import HomeLink from '../../components/links/HomeLink.vue';

export default{
    name: 'OfficeEditPage',

    components: {
        HomeLink
    },

    data(){
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            office_id: 0,
            messages: [],
            office_types: [],
            office: {
                id: 0,
                name: '',
                type: 0
            },
            selected: {
                type: {}
            }
        };
    },
    mounted(){
        const route = useRoute();
        this.office_id = route.params.id;
        this.getOffice();
    },
    created(){},
    setup(){},
    methods: {
        getOffice(){
            axios.get(`${this.office_id}/edit`)
                .then(response => {
                    this.office = response.data.data;
                    this.office_types = response.data.types;

                    //console.log(this.office);
                    //console.log(this.office_types);
                })
                .catch(error => { console.log(error); });
        },

        save() {
            //console.log('SAVE');
            //console.log(this.office);
            axios.post('', this.office)
                .then(resource => {
                    console.log(resource);
                })
                .catch(error => { console.log(error); });
        }
    }
}
</script>