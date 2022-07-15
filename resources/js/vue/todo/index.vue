<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <TodoListItem
                :item="item"
                class="item"
                v-on:itemchanged="$emit('reloadlist')"
            />
        </div>
    </div>
</template>
<script>
import show from "./show";

export default {
    props: ['items'],
    components: {
        'TodoListItem': show
    }
}
</script>
