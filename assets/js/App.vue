<template>

  <section id="gift">
    <div class="parallax parallax-it">
      <h2>Blow everyone else’s gift<br>
        out of the water</h2>
    </div>
    <div class="form-bg">
      <div class="form-wrap">
        <form @submit.prevent="checkForm" method="POST" name="orderGift">

          <p><b>How long</b> would you like them to enjoy the membership?</p>
          <div class="row full-borders">
            <div class="col-12 px-0 px-md-3 col-md-6">
              <div :class="{'active': membership === '1'}" @click="membership = '1'"
                   class="box-wrap">
                <div class="title">Half a year</div>
                <hr>
                <div class="price">$190</div>
              </div>
            </div>
            <div class="col-12 px-0 px-md-3 col-md-6">
              <div :class="{'active': membership === '2'}" @click="membership = '2'"
                   class="box-wrap">
                <div class="title">2 year</div>
                <hr>
                <div class="price">$350</div>
                <div class="discount">Save $30</div>
              </div>
            </div>
          </div>
          <p><b>Where</b> would you like the card to be sent?</p>
          <div class="row no-borders">
            <div class="col-12 px-0 px-md-3 col-md-6">
              <div :class="{'active': sendTo === '1'}" @click="sendTo = '1'" class="box-wrap">
                <div class="delivery">Send to me</div>
              </div>
            </div>
            <div class="col-12 px-0 px-md-3 col-md-6">
              <div :class="{'active': sendTo === '2'}" @click="sendTo = '2'" class="box-wrap">
                <div class="delivery">Send to them</div>
              </div>
            </div>
          </div>
          <hr class="divider">
          <p>Add a <b>personal message:</b></p>

          <input v-if="sendTo == '2'" type="text" v-model="form.reciever" placeholder="To (their name)"/>
          <textarea v-model="form.message" id="" cols="30" rows="10" placeholder="Your message"></textarea>
          <input type="text" v-model="form.sender" placeholder="From (your displayed name)"/>

          <div class="info-text">
            Carefully re-read the message before continuing to checkout.<br>
            Later corrections are not possible.
          </div>
          <div class="membership-text" v-html="totalAddedOption">
            {{ totalAddedOption }}<br>
            +<br>
            Quarterly Membership for yourself: <b>$95</b>
          </div>
          <hr class="divider-dotted">
          <div class="total">Your total: $<span>{{ result }}</span></div>
          <div v-if="errors.length" class="error-box">
            <b>Please correct the following error(s):</b>
            <ul class="list-unstyled">
              <li v-for="error in errors">{{ error }}</li>
            </ul>
          </div>
          <button type="submit" class="checkout" :class="{'hide': submitStatus == true}">Continue to checkout</button>
          <div v-if="submitStatus == true" class="thankYou">Thank you!</div>
        </form>

      </div>
    </div>
  </section>

</template>

<script>
import axios from 'axios'
export default {

  data() {
    return {
      counter            : 0,
      submit             : '',
      submitStatus       : false,
      membership         : '2',
      firstNumber        : 190.00,
      firstMsg           : "Half a year (Half year gift membership)",
      secondNumber       : 350.00,
      secondMsg          : "1 Year (1 Year year gift membership)",
      secondNumberSavings: 30,
      quarterlyFee       : 75,
      sendTo             : '1',
      targetId           : '',
      form               : {
        reciever: '',
        sender  : '',
        message : '',
      },
      errors             : [],
      name               : null,
      age                : null,
    }
  },

  computed: {
    recieverIsValid() {
      return !!this.form.reciever
    },
    senderIsValid() {
      return !!this.form.sender
    },
    formIsValid() {

      if(this.sendTo == "1" && this.submitStatus == false) {
        return this.senderIsValid
      }

      return this.recieverIsValid && this.senderIsValid
    },
    result() {
      if(this.membership == "1") {
        return this.firstNumber + this.quarterlyFee;
      } else {
        return this.secondNumber + this.quarterlyFee;
      }
    },
    totalAddedOption() {
      if(this.membership == "1") {
        return this.firstMsg + " <b>$" + this.firstNumber + "</b><br>+<br>Quarterly membership for yourself:<b> $" + this.quarterlyFee + "</b>"
      } else {
        return this.secondMsg + " <b>$" + (this.secondNumber) + " (save $" + this.secondNumberSavings + ") </b><br>+<br>Quarterly membership for yourself:<b> $" + this.quarterlyFee + "</b>"
      }
    }

  },

  methods: {

    checkForm: function(e) {

      let submitStatus = this.submitStatus
      let selectedReciever = this.sendTo
      this.errors = [];


      if(!this.form.reciever && this.sendTo == "2") {
        this.errors.push("To (their name) is required.");
        this.submitStatus = false
        console.log(this.submitStatus)
      }

      if(!this.form.sender)  {
        this.errors.push("From (your displayed name) is required.");
        this.submitStatus = false
        console.log(this.submitStatus)
      }


      if(this.errors.length == 0 || this.form.reciever && this.form.sender) {
        this.submitStatus = true
        console.log(this.submitStatus)

        let reciever = this.form.reciever
        if (reciever == "") {
          reciever = "no-reciever-selected"
        }


        axios.post('/order', {
              membershipPackage: this.membership,
              sendCardTo : this.sendTo,
              reciever : reciever,
              message: this.form.message,
              sender: this.form.sender
            })
            .then(function(response) {
              console.log(response);
            })
            .catch(function(error) {
              console.log(error);
            })
      }


      e.preventDefault();
    },
  }
}
</script>

<style>

</style>