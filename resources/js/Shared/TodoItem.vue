<template>
    <div>
        <div class="flex mb-4 items-center">
            <div
                class="w-full"
                :class="
                    data.isDone
                        ? 'line-through text-green-500'
                        : 'text-gray-900'
                "
            >
                <p class="w-full ">
                    {{ todo.title }}
                </p>
                <p class="text-sm " v-if="todo.assigned_date">
                    Due on
                    <span class="font-semibold">{{
                        $luxon(todo.assigned_date, "short")
                    }}</span>
                </p>
            </div>
            <button v-if="!(todo.isDone)"
                @click="check()"
                class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green-500 border-green-500 hover:bg-green-500 focus:outline-none  focus:shadow-outline-green"
            >
                Done
            </button>
            <button v-else
                @click="check()"
                class=" w-40 flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-gray-800 border-gray-800 hover:bg-gray-800 focus:outline-none  focus:shadow-outline-gray"
            >
                Not Done
            </button>
            <button
                @click="remove()"
                class="flex-no-shrink p-2 ml-2 mr-2 border-2 rounded text-red-500 border-red-500 hover:text-white focus:outline-none  focus:shadow-outline-red hover:bg-red-500"
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
        };
    },
    mounted() {
        const t = this;
        t.data.title = t.todo.title;
        t.data.isDone = t.todo.isDone;
        t.data.assigned_date = t.todo.assigned_date;
    },
    methods: {
        remove() {
            this.$inertia.post("/todo/delete", this.todo);
        },
        check() {
            const t = this;
            t.data.isDone = !t.data.isDone;
            t.$inertia.post("/todo/toggle", t.todo);
        }
    }
};
</script>

<style lang="scss" scoped></style>
