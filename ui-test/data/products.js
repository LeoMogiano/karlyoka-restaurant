import { faker } from '@faker-js/faker';

export const products = () => {
	const arrayProducts = [];
	for(let i = 0; i < 5; i++) {
		arrayProducts.push({
			"name": faker.helpers.arrayElement([ "Pollo económico", "1/4 de pollo", "Pollo entero", "Soda Cocacola", "Soda Fanta"]),
			"description": faker.lorem.paragraph(),
			"price": faker.number.float({ min: 10, max: 100 }),
			"stock": faker.number.int({ min: 1, max: 1000 }),
			"image": "http://diplomado/images/producto.jpg",
			"category": faker.helpers.arrayElement([ "Categoría 1", "Categoría 2", "Categoría 3" ]),
		})
	}
	return arrayProducts;
}