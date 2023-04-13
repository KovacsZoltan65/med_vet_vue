<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Humans Edit Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Humans</a></li>
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
                    <h3 class="card-title">Title</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <form @submit.prevent="save">
                    <div class="card-body">
                        <input type="hidden" id="id" name="id" v-model="human.id"/>
                        <!-- NAME -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                       id="name" name="name" 
                                       placeholder="Name" 
                                       aria-describedby="span_name" 
                                       v-model="human.name">
                                        <span id="span_name" name="span_name" 
                                             class="help-block invalid-feedback" 
                                             style="display: block;">
                                        </span>
                            </div>
                        </div>

                        <!-- TYPE -->
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" 
                                       id="type" name="type" 
                                       placeholder="Type" 
                                       aria-describedby="span_type" 
                                       v-model="human.type_id">
                                        <span id="span_type" name="span_type" 
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
                        <router-link to="/humans" 
                                     class="btn btn-info" 
                                     @click="save">
                            <i class="fas fa-save"></i>
                        </router-link>
                        <router-link to="/humans" 
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

export default {
    name: 'HumanEditPage',
    
    components: {},

    data(){
        return {
            human_id: 0,
            messages: [],
            human: {
                id: 0,
                name: '',
                type_id: 0,
            }
        };
    },
    
    mounted() {
        const route = useRoute();
        this.human_id = route.params.id;
        this.getHuman();
    },
    
    created() {},

    setup() {},

    methods: {
        getHuman(){
            //console.log('getHuman: ' + this.human_id);
            
            axios.get(`${this.human_id}/edit`)
                .then(response => {
                    this.human = response.data.data;
                })
                .catch(error => {
                    console.log('error:' + error);
                });
        },

        save() {
            console.log('SAVE');
            console.log(this.human);
        }
    }
}
</script>