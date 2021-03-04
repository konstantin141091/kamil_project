<template>
    <div>
        <h3 class="h3-mobile">Удалить все записи из реестра. Эта операция не обратима!!!</h3>
        <div class="form-btn">
            <button class="btn btn-danger" @click="openModel">УДАЛИТЬ ВЕСЬ РЕЕСТР</button>
        </div>
        <div v-show="show">
            <div class="modal d-block" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Удаление всего реестра!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Эта операция не обратима!!!</p>
                        </div>
                        <div class="modal-footer">
                            <a :href="vue_link" type="button" class="btn btn-danger">Удалить реестр</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">Отмена</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "DropStudentsComponent",
    props: ['link'],
    data: function () {
      return {
        show: false,
        vue_link: '',
      }
    },


    methods: {

      openModel() {
        this.show = true;
      },
      closeModal() {
        this.show = false;
      },
      drop() {
        window.location
      }
    },

    created() {
      this.vue_link = this.link;
    }
  }
</script>

<style scoped>
    .modal-our {
        display: block!important;
    }
</style>
