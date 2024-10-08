import { products } from "../../data/products";

describe("Products test", () => {
	before(() =>cy.login());

	it("page products", () => {
		cy.get(':nth-child(5) > .inline-flex').click(); cy.wait(2000);
		create(); cy.wait(1000);
		update(); cy.wait(1000);
		eliminar(); cy.wait(1000);
		search();
	})
});

function create() {
	for (const product of products()) {
		cy.get('.lg\\:w-3\\/5 > .justify-between > .flex > .inline-flex').click();
		
		if(product.name == "" || product.description == "" || product.price == "" || product.image == "" || product.category == "" ) {
			cy.get('.space-x-2 > .bg-white').click();
			continue;
		}
		cy.get('.mt-4 > .flex > :nth-child(1) > .w-full').type(product.name);  cy.wait(1000);
		cy.get('.flex > :nth-child(2) > .w-full').type(product.description);  cy.wait(1000);
		cy.get(':nth-child(3) > .w-full').type(product.price);  cy.wait(1000);
		cy.get('.flex > :nth-child(4) > .w-full').type(product.image);  cy.wait(1000);
		// cy.get(':nth-child(5) > .w-full').type(product.image);  cy.wait(1000);
		cy.get('select').select(product.category);  cy.wait(1000);
		cy.get('.space-x-2 > .bg-gray-800').click();
	}
}

function update() { //Salta las validaciones al actualizar
	cy.get(':nth-child(1) > :nth-child(6) > div > :nth-child(1)').click();
	cy.get(':nth-child(3) > .w-full').clear();  cy.wait(1000);
	cy.get(':nth-child(3) > .w-full').type(11.5);  cy.wait(1000);
	cy.get('.space-x-2 > .bg-gray-800').click();
}

function eliminar() {
	cy.get(':nth-child(1) > :nth-child(6) > div > :nth-child(2)').click();
	cy.get('.flex-row > .justify-center').click();
}

function search() {
	cy.get('.justify-between > .w-full').type("pollo");
}