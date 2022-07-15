<style>
*, ::after, ::before {
    box-sizing: border-box;
}

.todo-list-container {
    margin: auto;
    width: 400px;
    border-radius: .25rem;
    border: 2px solid darkgray;
    padding: 0.875rem;
    background-color: #e6e6e6;
}

.heading {
    text-align: center;
}
</style>
<template>
    <div class="todo-list-container">
        <div class="heading">
            <h2>Todo List</h2>
            <TodoCreateForm/>
        </div>
        <TodoListView :items="items"/>
    </div>
</template>
<script>
import create from "./todo/create";
import index from "./todo/index";

export default {
    data: function () {
        return {
            items: []
        }
    },
    components: {
        "TodoCreateForm": create,
        "TodoListView": index
    },
    methods: {
        getTodoListItems() {
            axios.get('/api/todos').then(response => {
            this.items = response.data;

            }).catch(error => {
                console.error(error);
            })
        }
    },
    created() {
        this.getTodoListItems();
    }
}
</script>
