<style>
.todo-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 2px solid #6c757d;
    border-radius: 0.25rem;
    padding: 0.625rem 0.875rem;
    margin: 0.875rem 0;
}

.todo-item-text {
    font-size: 1rem;
    font-family: sans-serif;
    text-align: left;
}

.completed {
    text-decoration: line-through;

}

.update-item-checkbox {
    margin-right: 1rem;
}
</style>
<template>
    <div class="todo-item">
        <input type="checkbox"
               class="update-item-checkbox"
               @change="updateCompleted()"
               v-model="item.completed"
        />
        <label :class="[item.completed ? 'completed' : '', 'todo-item-text']">{{ item.task }}</label>
        <font-awesome-icon
            icon="trash"
            @click="destroyItem()"
        />
    </div>
</template>
<script>
export default {
    props: ['item'],
    components: {},
    methods: {
        updateCompleted() {

        },
        destroyItem() {

        }
    }
}
</script>
