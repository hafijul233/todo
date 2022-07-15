<style scoped>
.todo-add-item {
    padding: 15px 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.add-item-input {
    display: block;
    margin-right: 10px;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    outline: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.add-item-input::placeholder {
    color: #6c757d;
    opacity: 1;
}

.add-item-input:focus {
    color: #495057;
    background-color: #fff;
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
}

.active {
    color: #00ce25;
}

.inactive {
    color: #999;
}

.plus {
    font-size: 2.5rem;
}
</style>
<template>
    <div class="todo-add-item">
        <input type="text" class="add-item-input" v-model="item.task"/>
        <font-awesome-icon
            icon="plus-square"
            @click="addItem()"
            :class="[ item.task ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            item: {
                task: ""
            }
        }
    },
    methods: {
        addItem() {
            if (this.item.name === '') {
                return;
            }

            axios.post('api/todos', {
                'task': this.item.task,
                "completed": false
            }).then(response => {
                if (response.status === 201) {
                    this.item.task = "";
                }
                this.$emit('reloadlist');
            }).catch(error => {
                console.error(error);
            })
        }
    }
}
</script>
