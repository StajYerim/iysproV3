<div style="position: absolute;top: 119px;right: 33px; width: 20%;z-index: 1" id="tag-widget">
    <vue-tags-input
            v-model="form.tag"
            :tags="form.tagsd"
            @tags-changed="newTags => form.tagsd = newTags"
    />
</div>
