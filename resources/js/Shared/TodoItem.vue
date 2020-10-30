<template>
    <div>
        <div class="flex mb-4 items-center">
            <div class="w-full">
                <p class="w-full text-gray-900">
                    {{ todo.title }}
                </p>
                <p class="text-sm text-gray-700">
                    Due on
                    <span class="font-semibold">{{
                        $luxon(todo.assigned_date, "short")
                    }}</span>
                </p>
            </div>
            <button
                class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green-500 border-green-500 hover:bg-green-500"
            >
                Done
            </button>
            <button
                @click="remove(todo.id)"
                class="flex-no-shrink p-2 ml-2 mr-2 border-2 rounded text-red-500 border-red-500 hover:text-white hover:bg-red-500"
            >
                Remove
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["todo"],
    data() {
        return {
            data: {
                title: "",
                isDone: false,
                assignedDate: ""
            }
        }
    },
    mounted() {
        const t = this;
        t.data.title = t.todo.title;
        t.data.assigned_date = t.todo.assigned_date;

    },
    methods: {
        remove(todoid) {
            this.$inertia.post("/todo/delete", {
                todoid: todoid
            });
        }
    }
};
</script>

<style lang="scss" scoped></style>
