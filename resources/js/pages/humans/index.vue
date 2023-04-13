<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Humans Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Humans Page</li>
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
                            <h3 class="card-title">Humans</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="pull-right mb-2">
                                <!-- ADD -->
                            <!--
                                <button type="button" class="btn btn-primary btn-sm" 
                                        @click="addHuman()"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-plus"></i>
                                </button>
                            -->
                            <router-link :to="{name: 'HumansCreate'}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i>
                            </router-link>

                                <!-- REFRESH -->
                                <button type="button" class="btn btn-success btn-sm ml-1" v-on:click="getHumans()">
                                    <i class="fas fa-sync"></i>
                                </button>
                            
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th>TYPE</th>
                                        <th class="col-md-3">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="value in list_of_humans" :key="value.id">
                                        <td>{{ value.id }}</td>
                                        <td>{{ value.name }}</td>
                                        <td>{{ value.type_id }}</td>
                                        <td>
                                        <!--
                                            <button type="button" class="btn btn-primary btn-sm" 
                                            @click="editHuman()">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        -->
                                            <router-link :to="{path: `/humans/${value.id}`}" 
                                                         class="btn btn-primary btn-sm">
                                                         <i class="fas fa-edit"></i>
                                            </router-link>

                                            <button type="button" class="btn btn-danger btn-sm ml-1">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->

                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

    

</template>

<script>

import DefaultButton from '../../components/buttons/DefaultButton.vue';

export default {
    name: 'HumansPage',

    components: {
        DefaultButton
    },

    data() {
        return {
            list_of_humans: [],
            messages: [],
            human: {
                "id": 0,
                "name": "",
                "type_id": 0
            },
            buttons: {
                new: {
                    to: {path: '/humans'},
                    class: 'btn btn-primary btn-sm',
                    icon: 'fas fa-trash',
                    title: 'DELETE'
                },
                refresh: {
                    type: 'button',
                    class: 'btn btn-success btn-sm ml-1',
                    icon: 'fas fa-sync',
                    title: 'REFRESH'
                },
                edit: {
                    to: '/humans',
                    class: 'btn btn-primary btn-sm',
                    icon: 'fas fa-edit',
                    title: 'EDIT'
                },
                delete: {
                    type: 'button',
                    class: 'btn btn-danger btn-sm ml-1',
                    icon: 'fas fa-trash',
                    title: 'DELETE'
                }
            }
        };
    },
    mounted() {
        //console.log('MOUNTED');
    },
    created() {
        //console.log('CREATED');
        this.getHumans();
    },
    methods: {
        getHumans() {
            // http://localhost:8000/api/humans
            axios.get("humans")
                .then((response) => {
                //console.log(response.data);
                this.list_of_humans = response.data.data;
                this.messages.push(response.data.message);
                //console.log(this.list_of_humans);
                //console.log(this.messages);
            })
                .catch(error => console.log(error));
        },
        editHuman() {
            console.log("EDIT");
        },
        addHuman() {
            console.log("ADD");
        },
    },
}

</script>