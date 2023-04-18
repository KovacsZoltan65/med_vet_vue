<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Human Create Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Humans</a></li>
                            <li class="breadcrumb-item active">Create</li>
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
                    <h3 class="card-title">Create Human</h3>

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
                    
                    <input type="hidden" name="_token" :value="csrf">

                    <div class="card-body">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" id="id" name="id" v-model="human.id" />

                        <!-- NAME -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    aria-describedby="span_name" v-model="human.name">
                                <span id="span_name" name="span_name" class="help-block invalid-feedback"
                                    style="display: block;">
                                </span>
                            </div>
                        </div>
                        <!-- TYPE -->
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col-sm-10">
                                
                                <select v-model="selected.type" class="form-control">
                                    <option v-for="type in human_types" :value="type.id">{{ type.name }}</option>
                                </select>
                                <span id="span_type" name="span_type" class="help-block invalid-feedback"
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
                        <router-link to="/humans" class="btn btn-info" @click="save">
                            <i class="fas fa-save"></i>
                        </router-link>
                        <router-link to="/humans" class="btn btn-default float-right">
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
export default {
    name: 'HumanCreatePage',

    components: {},

    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            human_types: [],
            human: {
                id: 0,
                name: '',
                type_id: 0
            },
            selected: {
                type: {}
            }
        }
    },
    mounted() {},
    created() {
        this.getHumanTypes();
    },
    setup() { },
    methods: {
        getHumanTypes() {
            axios.get('create')
                .then(response => {
                    //console.log(response);
                    this.human_types = response.data.data.types;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        save() {
            console.log('save');
            console.log(this.human);
        },
    }
}
</script>