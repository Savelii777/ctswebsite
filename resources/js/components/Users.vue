<template>
    <section class="content">
        <div class="filters" style="display:flex;align-items:end;">
            <div class="form-group mr-2">
                <label>ФИО</label>
                <input
                    v-model="name"
                    name="name"
                    type="text"
                    class="form-control"
                />
            </div>

            <div class="form-group mr-2">
                <label for="inputStatus2">Статус курса</label>
                <select
                    v-model="completed"
                    id="inputStatus2"
                    class="form-control custom-select"
                >
                    <option value="" selected>Все</option>
                    <option value="1">Завершен</option>
                    <option value="2">Не завершен</option>
                </select>
            </div>

            <div class="form-group mr-2">
                <label>Город</label>
                <input
                    v-model="city"
                    name="name"
                    type="text"
                    class="form-control"
                />
            </div>

            <div class="form-group mr-2">
                <label>Сфера деятельности</label>
                <input
                    v-model="placeOfWork"
                    name="name"
                    type="text"
                    class="form-control"
                />
            </div>

            <div class="form-group">
                <button
                    type="button"
                    class="btn btn-success float-right mt-2"
                    @click="getData"
                >
                    Применить
                </button>
            </div>
        </div>

        <!-- Default box -->
        <div class="card" v-if="!loading">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                ФИО
                            </th>
                            <th>
                                Завершено глав
                            </th>
                            <th>
                                Город
                            </th>
                            <th>
                                Сфера деятельности
                            </th>
                            <th>
                                Роли
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr :key="user.id" v-for="(user, index) in users">
                            <td>
                                {{ ++index }}
                            </td>
                            <td style="max-width: 300px">
                                {{ user.name }}
                            </td>
                            <td style="max-width: 300px">
                                {{ user.completed }} из 16
                            </td>
                            <td style="max-width: 300px">
                                {{ user.city }}
                            </td>
                            <td style="max-width: 300px">
                                {{ user.place_of_work }}
                            </td>
                            <td>
                                <div
                                    :key="'role' + key"
                                    v-for="(role, key) in user.roles"
                                >
                                    {{ role.name }}
                                </div>
                            </td>
                            <td class="project-actions text-right">
                                <a
                                    class="btn btn-info btn-sm"
                                    :href="`user/${user.id}/course/1/tests`"
                                >
                                    <i class="fas fa-check-square"></i> Тесты
                                </a>
                                <button
                                    type="button"
                                    class="btn btn-info btn-sm"
                                    data-toggle="modal"
                                    data-target="#modal-user"
                                    @click="selectUser(user)"
                                >
                                    <i class="fas fa-eye"> </i>
                                </button>
                                <a
                                    class="btn btn-primary btn-sm"
                                    :href="`/admin/user/${user.id}/edit`"
                                >
                                    <i class="fas fa-pencil-alt"> </i>
                                </a>

                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm delete-btn"
                                    data-toggle="modal"
                                    data-target="#modal-user-delete"
                                    @click="selectUser(user)"
                                >
                                    <i class="fas fa-trash"> </i>
                                </button>
                            </td>
                        </tr>

                        <!-- modal -->
                        <div class="modal fade" id="modal-user">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">
                                            {{
                                                selectedUser
                                                    ? selectedUser.name
                                                    : "не указано"
                                            }}
                                        </h4>
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <strong>ФИО: </strong
                                            >{{
                                                selectedUser
                                                    ? selectedUser.name
                                                    : "не указано"
                                            }}
                                        </p>
                                        <p>
                                            <strong>e-mail: </strong
                                            >{{
                                                selectedUser
                                                    ? selectedUser.email
                                                    : "не указано"
                                            }}
                                        </p>
                                        <p>
                                            <strong>Дата рождения: </strong
                                            >{{
                                                selectedUser
                                                    ? selectedUser.birth
                                                    : "не указано"
                                            }}
                                        </p>
                                        <p>
                                            <strong>Пол: </strong>
                                            {{
                                                selectedUser
                                                    ? selectedUser.sex
                                                    : "не указано"
                                            }}
                                        </p>
                                        <p>
                                            <strong>Город: </strong
                                            >{{
                                                selectedUser
                                                    ? selectedUser.city
                                                    : "не указано"
                                            }}
                                        </p>
                                    </div>
                                    <div
                                        class="modal-footer justify-content-center"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-default"
                                            data-dismiss="modal"
                                        >
                                            Закрыть
                                        </button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <div class="modal fade" id="modal-user-delete">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">
                                            {{
                                                selectedUser
                                                    ? selectedUser.name
                                                    : "не указано"
                                            }}
                                        </h4>
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Вы уверены, что хотите удалить
                                            пользователя
                                            {{
                                                selectedUser
                                                    ? " " + selectedUser.name
                                                    : " не указано"
                                            }}?
                                        </p>
                                    </div>
                                    <div
                                        class="modal-footer justify-content-center"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-default"
                                            data-dismiss="modal"
                                        >
                                            Закрыть
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-danger"
                                            data-dismiss="modal"
                                            @click="deleteUser"
                                        >
                                            Удалить
                                        </button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- loading -->
        <div v-if="loading" class="row">
            <div class="col-md-12" style="display:flex;justify-content:center">
                <h4>Загрузка...</h4>
            </div>
        </div>

        <div class="w100 d-flex justify-content-center">
            <pagination
                :limit="3"
                :data="laravelData"
                @pagination-change-page="getData"
            ></pagination>
        </div>
    </section>
</template>

<script>
export default {
    created() {
        console.log("hi");
        this.getData();
    },
    data() {
        return {
            loading: false,
            // filters
            name: "",
            completed: "",
            city: "",
            placeOfWork: "",
            // pagination
            laravelData: {},
            // table
            users: [],
            // modal
            selectedUser: null
        };
    },
    methods: {
        getData(page = 1) {
            this.loading = true;
            axios
                .get("/admin/api/users?page=" + page, {
                    params: {
                        name: this.name,
                        completed: this.completed,
                        city: this.city,
                        place_of_work: this.placeOfWork
                    }
                })
                .then(resp => {
                    console.log(resp);
                    this.loading = false;
                    this.users = resp.data.data;
                    this.laravelData = resp.data;
                })
                .catch(function(resp) {
                    this.loading = false;
                    console.log(resp);
                });
        },
        selectUser(user) {
            this.selectedUser = user;
        },
        deleteUser() {
            const removeIndex = this.users
                .map(item => item.id)
                .indexOf(this.selectedUser.id);
            this.users.splice(removeIndex, 1);
            axios
                .delete(`/admin/api/users/${this.selectedUser.id}`)
                .then(resp => {
                    console.log(resp);
                    $("#accept-remove").modal("hide");
                })
                .catch(err => {
                    console.log(err);
                    $("#accept-remove").modal("hide");
                });
        }
    }
};
</script>
