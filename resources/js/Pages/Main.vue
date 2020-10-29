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
                        <form @submit.prevent="submit">
                            <div class="flex my-4">
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                                    placeholder="Add Todo"
                                    v-model="form.title"
                                />
                                <button
                                    class="flex-no-shrink p-2 border-2 rounded text-green-500 border-green-500 font-bold hover:text-white hover:bg-green-500"
                                >
                                    Add
                                </button>
                            </div>
                        </form>
                        <div v-for="todo in todos" v-bind:key="todo.id">
                            <div class="flex mb-4 items-center">
                                <p class="w-full text-grey-900">
                                    {{ todo.title }}
                                </p>
                                <button
                                    class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green-500 border-green-500 hover:bg-green-500"
                                >
                                    Done
                                </button>
                                <button
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
                title: null
            }
        };
    },
    created() {
        // console.log(this.$page.user.id);
    },
    methods: {
        submit() {
            this.$inertia.post('/todo/create/'+this.$page.user.id, this.form);
        }
    }
};
</script>
