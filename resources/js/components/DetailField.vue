<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <Excerpt :content="field.value" :should-show="field.shouldShow" />
        </template>
    </PanelItem>
</template>

<script>
export default {
    props: ["resource", "resourceName", "resourceId", "field", "index"],
};
</script>

<style>
.markdown {
    p {
        font-size: inherit;
        margin-bottom: 1rem;
    }
}
</style>
