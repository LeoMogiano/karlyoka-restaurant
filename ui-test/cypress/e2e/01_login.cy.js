describe("Login test", () => {
	it("login success", () => {
		cy.visit('/')
		cy.visit("/login")
		cy.get('#email').type("test@example.com")
		cy.get('#password').type("password")
		cy.get('.inline-flex').click()
		cy.url().should('include', '/dashboard')
	})
})