<template>
    <todo-layout>
        <div>
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white shadow-xl p-4 border sm:rounded-md "
                    >
                        <div class="flex justify-center">
                            <h1 class="font-extrabold text-3xl">Your Todos</h1>
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
                                    required
                                    placeholder="Enter date"
                                    :min-datetime="new Date().toISOString()"
                                    v-model="form.assigned_date"
                                ></datetime>
                                <button
                                    class="flex-no-shrink p-2 border-2 rounded text-green-500 border-green-500 font-bold hover:text-white hover:bg-green-500"
                                >
                                    Add
                                </button>
                            </div>
                        </form>
                        <div class="max-h-screen overflow-auto">
                            <div v-for="todo in todos" v-bind:key="todo.id" >
                                <todo-item :todo="todo"></todo-item>
                            </div>
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
                assigned_date: null
            },
        };
    },
    methods: {
        add() {
            this.$inertia.post("/todo/create/" + this.$page.user.id, this.form);
            this.form = {
                title: null,
                assigned_date: null
            };
        },
    }
};
</script>
