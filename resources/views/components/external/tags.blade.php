<div style="position: absolute;top: 119px;right: 33px; width: 20%;z-index: 1"
     id="tag-widget">
    <vue-tags-input
            :max-tags="10"
            :maxlength="30"
            v-model="form.tag"
            :tags="form.tagsd"
            :placeholder="form.tagsd >= 10 ? 'Daha fazla etiket ekleyemezsiniz. Max(10)' : 'Etiket Ekle'"
            :autocomplete-items="filteredItems"
            @tags-changed="newTags => form.tagsd = newTags"
    />
</div>