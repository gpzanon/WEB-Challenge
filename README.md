# *WEB-Challenge: Desenvolvedor WEB PHP Full Stack Pleno*

## *Backend*
### *Criar o banco de dados de acordo com a modelagem*</br>
*Monte uma base de veículo com a estrutura abaixo*</br>
*Utilize **MySQL** para armazenar os dados que a API irá consumir*</br>
*Lembre-se de implementar um **seeder** para popular o banco de dados inicialmente*</p>
***Tabela Marcas** (Id PrimaryKey Identity, Nome VARCHAR 300),**Tabela Veiculos** (Id INT Primary Key Identity, MarcaID INT Foreign Key Tabela Marcas, Veiculo VARCHAR 150, Ano VARCHAR 4, Modelo VARCHAR 4, Descricao VARCHAR MAX, Vendido BOOLEAN, DataCriacao DATETIME, DataAtualizacao DATETIME, DataVenda DATETIME)*

### *API Endpoints*</br>
*GET /veiculos: Retorna todos os veículos (com detalhes da Marca)*</br>
*GET /veiculos/{id}: Retorna os detalhes do veículo (com detalhes da Marca)*</br>
*POST /veiculos: Adiciona um novo veículo*</br>
*PUT /veiculos/{id}: Atualiza os dados de um veículo*</br>
*PUT /veiculos/{id}: Atualiza os dados de um veículo*</br>
*DELETE /veiculos/{id}: Excluir o veículo*</br>
*PATCH /veiculos/{id}: Atualiza apenas o status de "vendido" para true ou false*</br>

## *Frontend*
### *Desenvolver a aplicação*</br>
*Desenvolver uma aplicação web responsável por gerenciar o cadsatro completo de usuários via API RestFul*</br>
*Para isso utilize o framework [PHP Laravel/Lumen](https://lumen.laravel.com/)*</br>
*Utilize todos os métodos (GET, POST, PUT, DELETE)*</br>
*A aplicação deverá deverá ser desenvolvida em [VUE.js](https://vuejs.org/), conforme o desenho situado na pasta [layout](https://github.com/gpzanon/WEB-Challenge/tree/main/Layout)*</br>
*A aplicação deverá consumir a **API** criada anteriormente*</br>
*Se preferir, faça uso de algum framework no desenvolvimento da interface como [Vuetify](https://vuetifyjs.com/en/), [Bootstrap](https://getbootstrap.com/), [Materialize](https://getbootstrap.com/)*</br>
*A tela deverá conter:*</br>
- *listagem dos veículos*</br>
- *detalhes do veículo*</br>
- *busca de veículos*</br>
- *formulário de cadastro/edição do veículos*</p></p>

### *Instruções gerais sobre o desafio*

#### *Sobre o repositório*
- ***Fork** esse repositório e faça o desafio numa **branch** com o seu nome (exemplo: `nome-sobrenome`)*</br>
- *Assim que concluir o seu desafio, abra um **pull request** com suas alterações*</br>

#### *Tempo gasto*
- *Recomendamos dispensar aténo máximo 10 horas neste teste*</br>

#### *Escopo do desafio*</br>
- *Instruções básicas de uso dos métodos*</br>
- *Documentar todas suposições realizadas*</br>
- *O desenvolvimento do backend deve ser feito em PHP*</br>
- *Preferencialmente utilizar **Laravel 5.6+** com toda sua stack*</br>
- *Preferencialmente utilizar **CodeIgniter***</br>
- *É aceitável utilizar algumas respostas estáticas em determinadas porções da aplicação*</br>
- *Deverão ser disponibilizados no `Git`:*</br>
  *(a) Estrutura SQL utilizada para a criação do banco de dados*</br>
  *(b) O código-fonte do programa utilizado na implementação da solução*</br>
  *(c) Orientação com o passo-a-passo para execução do código a partir de um arquivo README.md*
  
#### *O que será avaliado*</br>
- *Será avaliado os critérios: manutenabilidade, clareza e limpeza de código; resultado funcional; entre outros fatores*</br>
- *O histórico no `git` também está avaliado*</br>
- *Não esqueça de documentar o processo necessário para rodar a aplicação*</br>
- *Se necessário explique as decisões técnicas tomadas, as escolhas por bibliotecas e ferrramentas, o uso de patterns etc.*</br>

#### *Diferenciais*
- *Criar uma camada de segurança para uso da API*
- *Liberação da aplicação utilizando Docker*
- *Boa documentação de código e de serviços*
- *Autenticação com JWT*
- *Teste Unitário da API (HTTP Test)*
- *Implementar Cache com Redis na busca de veículos*
- *Design Patterns (SOLID, Service Container)*</p>

##### *Em caso de dúvidas, envie um email para [Helder Donda](mailto:helder.dev@seguralta.com.br) ou [Aline Pappa](mailto:aline.dev@seguralta.com.br)*
*Um dos nossos pilares é a valorização das pessoas e temos orgulho de dizer que somos uma empresa que apoia a diversidade e inclusão. Sendo assim, consideramos todos os candidatos para as nossas oportunidades, independente de raça, cor, religião, gênero, identidade de gênero, nacionalidade, deficiência, ascendência ou idade.*
