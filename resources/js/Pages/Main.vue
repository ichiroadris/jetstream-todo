<template>
    <todo-layout>
        <div>
            <div class="py-2">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-xl p-4 border sm:rounded-md"
                    >
                        <div class="flex justify-center">
                            <h1 class="font-extrabold text-3xl">Todos</h1>
                        </div>
                        <div class="flex mt-4">
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                                placeholder="Add Todo"
                            />
                            <button
                                class="flex-no-shrink p-2 border-2 rounded text-green-500 border-green-500 font-bold hover:text-white hover:bg-green-500"
                            >
                                Add
                            </button>
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
    }
};
</script>
