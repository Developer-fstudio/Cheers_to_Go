import React from 'react';
import { View, Text, FlatList, Image, StyleSheet, Dimensions, TouchableOpacity } from 'react-native';

const ProductScreen = () => {
  const products = [
    {
      id: 1,
      items: [
        { name: 'Produto 1', price: 9.99, image: 'https://www.acouplecooks.com/wp-content/uploads/2020/05/Clover-Club-Cocktail-006.jpg' },
        { name: 'Produto 2', price: 19.99, image: 'https://www.acouplecooks.com/wp-content/uploads/2021/05/Strawberry-Mojito-008.jpg' },
      ],
    },
    {
      id: 2,
      items: [
        { name: 'Produto 3', price: 14.99, image: 'data:image/jpeg;base64,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' },
        { name: 'Produto 4', price: 24.99, image: 'https://images.immediate.co.uk/production/volatile/sites/30/2023/01/Shirley-temple-1e55cf0.jpg?quality=90&resize=556,505' },
      ],
    },{
		id: 4,
		items: [
		  { name: 'Produto 1', price: 9.99, image: 'https://www.acouplecooks.com/wp-content/uploads/2020/05/Clover-Club-Cocktail-006.jpg' },
		  { name: 'Produto 2', price: 19.99, image: 'https://www.acouplecooks.com/wp-content/uploads/2021/05/Strawberry-Mojito-008.jpg' },
		],
	  },
	  {
		id: 5,
		items: [
		  { name: 'Produto 3', price: 14.99, image: 'data:image/jpeg;base64,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' },
		  { name: 'Produto 4', price: 24.99, image: 'https://images.immediate.co.uk/production/volatile/sites/30/2023/01/Shirley-temple-1e55cf0.jpg?quality=90&resize=556,505' },
		],
	  },
    // Adicione mais produtos aqui...
  ];

  const renderProduct = ({ item }) => (
    <View style={styles.cardContainer}>
      {item.items.map((product) => (
        <View key={product.name} style={styles.card}>
          <Image source={{ uri: product.image }} style={styles.image} />
          <Text style={styles.name}>{product.name}</Text>
          <Text style={styles.price}>{product.price.toFixed(2)} €</Text>
          <TouchableOpacity style={styles.button}>
        <Text style={styles.buttonText}>Adicionar ao Carrinho</Text>
      </TouchableOpacity>
        </View>
      ))}
    </View>
  );

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Produtos</Text>
      <FlatList
        data={products}
        renderItem={renderProduct}
        keyExtractor={(item) => item.id.toString()}
        contentContainerStyle={styles.list}
      />
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 16,
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    marginBottom: 10,
  },
  list: {
    flexGrow: 1,
  },
  cardContainer: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    marginBottom: 10,
  },
  card: {
    flex: 1,
    backgroundColor: '#FFFFFF',
    borderRadius: 8,
    padding: 16,
    marginHorizontal: 8,
    shadowColor: '#000000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 4,
    elevation: 2,
  },
  image: {
    width: '100%',
    height: 150,
    resizeMode: 'cover',
    borderRadius: 8,
    marginBottom: 8,
  },
  name: {
    fontSize: 18,
    fontWeight: 'bold',
    marginBottom: 8,
  },
  price: {
    fontSize: 16,
    color: '#888888',
  },
  button: {
    backgroundColor: '#2f2f35',
    borderRadius: 4,
    paddingVertical: 8,
    paddingHorizontal: 12,
    marginTop: 8,
    alignItems: 'center',
  },
  buttonText: {
    color: '#FFFFFF',
    fontWeight: 'bold',
    fontSize: 14,
  },
});

export default ProductScreen;
