const { categoriesActions } = require("./categories.cy");
const { login } = require("./login.cy");
const { ordersActions } = require("./orders.cy");
const { productsActions } = require("./products.cy");
const { usersActions } = require("./users.cy");

describe('The Home Page', () => {
	it('successfully loads', () => {
		login();
		usersActions();
		categoriesActions();
		productsActions();
		ordersActions();
	})

	// it('Mostrar un mensaje de error para credenciales inválidas', () => {
	// 	cy.visit('/login')
	// 	cy.get('#email').type("test@example.com")
	// 	cy.get('#password').type("password")
	// 	cy.get('.inline-flex').click()
	// 	cy.contains('Credenciales inválidas').should('exist')
	// })
});
