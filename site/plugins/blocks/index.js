panel.plugin("viaindustriae/blocks", {
  blocks: {
    contactblock: {
      template: `
        <div class="block">
          <div v-if="content.title" class="text-title">
            <k-writer
                v-bind="field('title')"
                :inline="true"
                :marks="false"
                :nodes="false"
                :value="content.title"
                @input="update({ title: $event })">
            </k-writer>
          </div>
          <div v-if="content.text" class="text">
            <k-writer
              v-bind="field('text')"
              :inline="true"
              :marks="false"
              :nodes="false"
              :value="content.text"
              @input="update({ text: $event })">
            </k-writer>
          </div>
      `
    },
    button: {
      template: `
          <input class="button"
            type="text"
            :value="content.text"
            @input="update({ text: $event.target.value })"
          />
      `
    },
    platformblock: {
      template: `
        <div class="input-wrapper">
            <k-input class="input-title"
              v-bind="field('title')"
              :value="content.title"
              @input="update({ title: $event })">
            </k-input>
            <k-input 
              v-bind="field('typology')"
              :value="content.typology"
              @input="update({ typology: $event })">
            </k-input>
            <k-input 
              v-bind="field('members')"
              :value="content.members"
              @input="update({ members: $event })">
            </k-input>
        </div>
      `
    },
  }
});