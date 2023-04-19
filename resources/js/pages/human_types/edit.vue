<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Human Type</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <!--<a href="#">Home</a>-->
                                <HomeLink />
                            </li>
                            <li class="breadcrumb-item">
                                <!--<a href="#">Human Types</a>-->
                                <router-link :to="{name: 'HumanTypes'}" >Human Types</router-link>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
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
                    <h3 class="card-title">Edit Human Type</h3>

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
                <form @submit.prevent="updateHumanType">
                    <div class="card-body">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" id="id" name="id" v-model="human_type.id"/>
                        
                        <!-- NAME -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                       id="name" name="name" 
                                       placeholder="Name" 
                                       aria-describedby="span_name" 
                                       v-model="human_type.name" />
                                <span id="span_name" name="span_name" 
                                        class="help-block invalid-feedback" 
                                        style="display: block;">
                                </span>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <!--
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-save"></i>
                        </button>
                    -->
                        <router-link to="/human_types" 
                                     class="btn btn-info" 
                                     @click="updateHumanType">
                            <i class="fas fa-save"></i>
                        </router-link>
                        <router-link to="/human_types" 
                                     class="btn btn-default float-right">
                            <i class="fas fa-door-open"></i>
                        </router-link>
                    </div>
                </form>
                <!-- /.card-footer-->
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
    name: 'HumanTypeEditPage',
    components: {
        HomeLink
    },
    data(){
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            human_type_id: 0,
            messages: [],
            human_type: {
                id: 0,
                name: '',
            }
        };
    },
    mounted(){
        const route = useRoute();
        this.human_type_id = route.params.id;
        this.getHumanType();
    },
    created(){},
    methods:{
        getHumanType(){
            axios.get(`${this.human_type_id}/edit`)
                .then(resource => {
                    //console.log(resource);
                    this.human_type = resource.data.data;
                })
                .catch(error => console.log(error));
        },
        deleteHumanType(){},
        updateHumanType(){},
    }
}
</script>