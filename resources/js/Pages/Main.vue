<template>
    <todo-layout>
        <div>
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow-xl p-4 border sm:rounded-md ">
                        <div class="flex justify-between w-full items-center">
                            <h1 class="font-extrabold text-3xl">Your Todos</h1>
                            <input
                                class="appearance-none border-b rounded py-2 px-3 mr-2 text-grey-darker outline-none"
                                autocomplete="off"
                                placeholder="Search todo"
                                v-model="data.search"

                            />
                        </div>
                        <form @submit.prevent="add">
                            <div class="flex my-4">
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-grey-darker"
                                    required
                                    placeholder="Add Todo"
                                    v-model="form.title"
                                />
                                <datetime
                                    class="border shadow rounded mr-2 p-2"
                                    type="datetime"
                                    use12-hour
                                    auto
                                    placeholder="Enter date"
                                    :min-datetime="new Date().toISOString()"
                                    v-model="form.assigned_date"
                                ></datetime>
                                <button
                                    class="flex-no-shrink p-2 border-2 rounded text-green-500 border-green-500 font-bold hover:text-white hover:bg-green-500 focus:outline-none  focus:shadow-outline-green"
                                >
                                    Add
                                </button>
                            </div>
                        </form>
                        <div class="max-h-screen overflow-auto">
                            <div v-if="todos.length">
                                <div v-for="todo in todos" v-bind:key="todo.id">
                                    <todo-item :todo="todo"></todo-item>
                                </div>
                            </div>
                            <div v-else>No todo yet</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </todo-layout>
</template>

<script>
import TodoLayout from "@/Layouts/TodoLayout";
import TodoItem from "@/Shared/TodoItem";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";

export default {
    components: {
        TodoLayout,
        TodoItem
    },
    props: ["todos"],
    data() {
        return {
            form: {
                title: null,
                assigned_date: null,
            },
            data: {
                search: ""
            }
        };
    },
    methods: {
        add() {
            this.$inertia.post("/todo/create/" + this.$page.user.id, this.form);
            this.form = {
                title: null,
                assigned_date: null
            };
        }
    },
    watch: {
        data: {
            handler: throttle(function() {
                let query = pickBy(this.data);
                this.$inertia.replace(
                    this.route(
                        "dashboard",
                        Object.keys(query).length
                            ? query
                            : {  }
                    )
                );
            }, 150),
            deep: true
        }
    }
};
</script>
