<template>
    <button :type="type" 
            :class="class">
        <i :class="icon"></i>&nbsp;{{ title }}
    </button>
</template>

<script>
    export default {
        name: 'DefaultButton',
        props: [ 'type', 'title', 'class', 'icon' ],
    }
</script>