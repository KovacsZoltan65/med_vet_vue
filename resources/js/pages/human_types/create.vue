<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Human Type</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Human Types</a></li>
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
                    <h3 class="card-title">Create Human Type</h3>

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
                <form @submit.prevent="createHumanType">
                    
                    <input type="hidden" name="_token" :value="csrf">

                    <div class="card-body">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" id="id" name="id" v-model="human_type.id" />

                        <!-- NAME -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" 
                                       placeholder="Name" aria-describedby="span_name" 
                                       v-model="human_type.name">
                                <span id="span_name" name="span_name" 
                                      class="help-block invalid-feedback"
                                      style="display: block;">
                                </span>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <router-link to="/human_types" class="btn btn-info" @click="createHumanType">
                            <i class="fas fa-save"></i>
                        </router-link>
                        <router-link to="/human_types" class="btn btn-default float-right">
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
export default{
    name: 'HumanTypeCreatePage',
    components: {},
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            human_type: {
                id: 0,
                name: ''
            },
            selected: {
                type: {}
            }
        }
    },
    mounted(){},
    created(){
        this.getHumanType();
    },
    methods:{
        getHumanType(){
            /*
            axios.get('')
                .then(response => {
                    console.log(response);
                    //this.human_types = response.data;
                })
                .catch(error => { console.log(error); });
            */
        },
        deleteHumanType(id){},
        editHumanType(id){},
        createHumanType(){},
    }
}
</script>