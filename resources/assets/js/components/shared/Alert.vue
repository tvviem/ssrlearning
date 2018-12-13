<template>
    <v-snackbar :value="snackbar" :color="color" :timeout="timeshow">
      {{ content }}
      <!-- <v-btn dark flat @click="showed=false">Close</v-btn> -->
    </v-snackbar>
</template>

<script>
export default {
  props: ['msgContent', 'typeMsg', 'timeout', 'snackbar'],
  computed: {
    showed() {
      return this.snackbar;
    },
    color() {
      return this.typeMsg;
    },
    timeshow() {
      return this.timeout;
    },
    content() {
      return this.msgContent;
    }
  }
}
</script>