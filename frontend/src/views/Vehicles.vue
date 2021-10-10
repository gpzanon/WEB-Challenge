<template>
    <main>
      <div class="list-container">
        <b-input-group class="gap-2">
          <b-form-input
            @keyup="getAllVehicles()"
            v-model="term"
            placeholder="Pesquise por um veículo"
          ></b-form-input>
          <b-input-group-append>
            <b-button v-b-modal.modal-form variant="secondary">
              <b-icon icon="plus-circle" font-scale="1"></b-icon>
            </b-button>
          </b-input-group-append>
        </b-input-group>
        <b-spinner v-show="isLoading"></b-spinner>
        <div
          v-show="!isLoading"
          v-for="vehicle in vehicles"
          :key="vehicle.id"
          class="item-container"
        >
          <div class="items" @click="getVehicleById(vehicle.id)">
            <ol>
              <li class="title">{{ vehicle.brand_name }}</li>
              <li class="name">{{ vehicle.name }}</li>
              <li class="year">{{ vehicle.vehicle_year }}</li>
            </ol>
          </div>
          <div>
            <b-icon
              @click="updateStatusSold(vehicle.id)"
              :class="vehicle.is_sold ? 'tag-active' : ''"
              icon="tag-fill"
              font-scale="1.7"
            ></b-icon>
          </div>
        </div>
      </div>
      <div>
        <div class="info-container">
          <div class="info-body">
            <span class="info-title text-start">{{ vehicle.name }}</span>
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-column align-items-start">
                <strong>Marca</strong>
                <span class="text-muted">{{ vehicle.brand_name }}</span>
              </div>
              <div class="d-flex flex-column align-items-start">
                <strong>Ano</strong>
                <span class="text-muted">{{ vehicle.vehicle_year }}</span>
              </div>
            </div>
            <p class="text-start">
              {{ vehicle.description }}
            </p>
          </div>
          <div class="info-footer">
            <b-button
              @click="editVehicle(vehicle.id)"
              :disabled="!vehicle.id"
              class="button-edit"
            >
              <span>Editar</span>
              <b-icon icon="pencil" font-scale="0.9"></b-icon>
            </b-button>
            <b-icon :class="vehicle.is_sold ? 'tag-active' : ''" icon="tag-fill" font-scale="1.7"></b-icon>
          </div>
        </div>
      </div>
      <b-modal
        id="modal-form"
        hide-footer
        hide-header-close
        :title="data.id ? 'Editar Veículo' : 'Novo Veículo'"
      >
        <b-form @submit.prevent="onSubmit">
        <div class="d-block">
            <b-form-group id="input-group-2" label="Veículo" label-for="input-2">
              <b-form-input
                id="input-2"
                v-model="data.name"
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-3" label="Marca:" label-for="input-3">
              <b-form-select
                id="input-3"
                class="form-select"
                v-model="data.brand_id"
                :options="brands"
                @change="getSelectedBrand"
                value-field="id"
                text-field="name"
                required
              ></b-form-select>
            </b-form-group>

            <b-form-group id="input-group-2" label="Ano" label-for="input-2">
              <b-form-input
                id="input-2"
                v-model="data.vehicle_year"
                type="number"
                max="2021"
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Ano Modelo" label-for="input-2">
              <b-form-input
                id="input-2"
                v-model="data.brand_year"
                type="number"
                max="2021"
                required
              ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Descrição" label-for="input-2">
              <b-form-textarea
                id="textarea"
                v-model="data.description"
                placeholder="Enter something..."
                rows="3"
                max-rows="6"
              ></b-form-textarea>
            </b-form-group>

            <b-form-checkbox
              id="checkbox-1"
              v-model="data.is_sold"
              name="checkbox-1"
              value="true"
              unchecked-value="false"
            >
              Vendido ?
            </b-form-checkbox>
        </div>
        <div class="d-flex justify-content-end mt-2 align-items-center gap-2">
          <b-button type="submit">Salvar</b-button>
        </div>
        </b-form>
      </b-modal>
    </main>
</template>

<script>
import api from '../services/api'
export default {
  name: 'Vehicles',
  data () {
    return {
      term: '',
      vehicles: [],
      brands: [],
      vehicle: {},
      data: {},
      isLoading: false
    }
  },
  created () {
    this.getAllVehicles()
  },
  methods: {
    getSelectedBrand () {
      if (!this.data.brand_id) return

      const { name } = this.brands.find(brand => brand.id === this.data.brand_id)
      this.data.brand_name = name
    },
    async getAllVehicles () {
      if (this.term && this.term.length < 3) return

      this.isLoading = true
      const params = {
        term: this.term
      }
      const response = await api.get('/veiculos', { params })
      const { data } = response
      this.vehicles = data.vehicles
      this.brands = data.brands
      this.isLoading = false
    },
    async editVehicle (id) {
      const response = await api.get(`/veiculos/${id}`)
      const { data } = response
      this.data = data
      this.$bvModal.show('modal-form')
    },
    async getVehicleById (id) {
      const response = await api.get(`/veiculos/${id}`)
      const { data } = response
      this.vehicle = data
    },
    async saveVehicle () {
      return await api.post('/veiculos', this.data)
    },
    async updateVehicle () {
      await api.put(`/veiculos/${this.vehicle.id}`, this.data)
    },
    async onSubmit () {
      if (this.vehicle.id) {
        await this.updateVehicle()
        const filteredVehicles = this.vehicles.filter(vehicle => vehicle.id !== this.data.id)
        this.vehicles = [
          ...filteredVehicles,
          this.data
        ]
      } else {
        const { data } = await this.saveVehicle()
        const newVehicle = {
          ...data,
          ...this.data
        }
        this.vehicles.push(newVehicle)
      }
      this.data = {}
      this.$bvModal.hide('modal-form')
      this.$toast('Veículo salvo com sucesso!')
    },
    async updateStatusSold (id) {
      await api.patch(`/veiculos/${id}`)
      this.$toast('Alterado o status de venda!')
      this.vehicles.map(vehicle => {
        if (vehicle.id !== id) return

        return {
          ...vehicle,
          is_sold: !vehicle.is_sold
        }
      }, id)
    }
  }
}
</script>

<style scoped>
  main {
    display: grid;
    gap: 10px;
    grid-template-columns: 55% 45%;
    width: 100%;
    padding: 30px 50px;
    margin-top: 60px;
    height: calc(100vh - 60px);
  }
  .info-container {
    background-color: #f1f2f0;
    border-radius: 4px;
    border: 0;
  }
  .info-body {
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding: 30px;
  }
  .info-title {
    font-weight: bold;
    color: #189c6c;
  }
  .info-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    border-top: 1px solid #b4b4b4;
  }
  .button-edit {
    font-size: 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
  }
  div.item-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 30px;
    background-color: #fff;
    margin-top: 10px;
  }

  .tag-active {
    color: #189c6c;
  }

  div.items {
    display: flex;
    justify-content: flex-start;
    cursor: pointer;
  }

  div div ol {
    text-align: start;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  li.title {
    font-size: 20px;
  }

  li.name {
    font-weight: 700;
    color: #189c6c;
  }

  li.year {
    color: #798083;
  }
  .item-container div:last-child {
    cursor: pointer;
  }
</style>
