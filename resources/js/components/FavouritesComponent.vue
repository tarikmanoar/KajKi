<template>
    <div>
        <button v-if="show" @click.prevent="unsaved()" class="btn btn-warning" style="width: 100%;">unsaved</button>
        <button v-else @click.prevent="save()" class="btn btn-secondary" style="width: 100%;">save</button>
    </div>
</template>

<script>
    export default {
        props: ['jobid', 'favourite'],
        mounted() {
            this.show = this.jobFavourite ? true : false;
        },
        data() {
            return {
                'show': true
            }
        },
        computed: {
            jobFavourite() {
                return this.favourite
            }
        },
        methods: {
            save() {
                axios.post('/save/' + this.jobid).then(response => this.show = true).catch(error => alert(error));
            },
            unsaved() {
                axios.post('/unsaved/' + this.jobid).then(response => this.show = false).catch(error => alert(error));
            },
        }

    }
</script>
