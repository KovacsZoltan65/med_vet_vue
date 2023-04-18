<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Human Types Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Human Types Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">

                    <!-- Default box -->
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Human Types</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" 
                                        data-card-widget="collapse" 
                                        title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" 
                                        data-card-widget="remove" 
                                        title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            
                            <div class="pull-right mb-2">
                                <router-link :to="{name: 'HumanTypesCreate'}" 
                                              class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i>
                                </router-link>

                                <!-- REFRESH -->
                                <button type="button" class="btn btn-success btn-sm ml-1" 
                                        v-on:click="getHumanTypes()">
                                    <i class="fas fa-sync"></i>
                                </button>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th class="col-md-3">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="value in human_types" :key="value.id">
                                        <td>{{ value.id }}</td>
                                        <td>{{ value.name }}</td>
                                        <td>
                                            <router-link :to="{path: `/human_types/${value.id}`}" 
                                                         class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </router-link>

                                            <button type="button" 
                                                    class="btn btn-danger btn-sm ml-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default{
    name: 'HumanTypesPage',
    components: {},
    data(){
        return {
            human_types: [],
            messages: [],
            human_type: {
                id: 0,
                name: ''
            }
        };
    },
    mounted(){},
    created(){
        this.getHumanTypes();
    },
    methods:{
        getHumanTypes(){
            axios.get('human_types')
                .then(response => {
                    //console.log(response.data.data);
                    this.human_types = response.data.data;
                })
                .catch(error => { console.log(error); });
        },
        deleteHumanType(id){},
        editHumanType(id){},
        createHumanType(){},
    }
}
</script>