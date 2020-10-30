<template>
    <todo-layout>
        <div>
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-xl p-4 border sm:rounded-md "
                    >
                        <div class="flex justify-center">
                            <h1 class="font-extrabold text-3xl">Todos</h1>
                            <!-- <inertia-link
                                method="post"
                                :href="`todo/create/${$page.user.id}`"
                                >Test</inertia-link
                            > -->
                        </div>
                        <form @submit.prevent="add">
                            <div class="flex my-4">
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 mr-2 text-grey-darker"
                                    placeholder="Add Todo"
                                    v-model="form.title"
                                />
                                <input type="datetime-local" name="name" id="" v-model="form.assigned_date" class="mr-2 border shadow rounded p-2">
                                <button
                                    class="flex-no-shrink p-2 border-2 rounded text-green-500 border-green-500 font-bold hover:text-white hover:bg-green-500"
                                >
                                    Add
                                </button>
                            </div>
                        </form>
                        <div v-for="todo in todos" v-bind:key="todo.id">
                            <div class="flex mb-4 items-center">
                                <div class="w-full">
                                    <p class="w-full text-gray-900">
                                        {{ todo.title }}
                                    </p>
                                    <p class="text-sm text-gray-700">Due on <span class="font-semibold">{{todo.assigned_date}}</span></p>
                                </div>
                                <button
                                    class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green-500 border-green-500 hover:bg-green-500"
                                >
                                    Done
                                </button>
                                <button @click="remove(todo.id)"
                                    class="flex-no-shrink p-2 ml-2 border-2 rounded text-red-500 border-red-500 hover:text-white hover:bg-red-500"
                                >
                                    Remove
                                </button>
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

export default {
    components: {
        TodoLayout
    },
    props: ["todos"],
    data() {
        return {
            form: {
                title: null,
                assigned_date: null
            }
        };
    },
    // created() {
    //     // console.log(this.$page.user.id);
    // },
    methods: {
        add() {
            // console.log(this.form);
            this.$inertia.post('/todo/create/'+this.$page.user.id, this.form);
        },
        remove(todoid) {
            console.log(todoid);
            this.$inertia.post('/todo/delete', {
                todoid: todoid
            })
        }
    }
};
</script>
