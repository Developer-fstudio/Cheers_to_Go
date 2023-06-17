import React from 'react';
import { View, Text, FlatList, Image, StyleSheet, TouchableOpacity } from 'react-native';

const CartScreen = () => {
const cartItems = [
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
      { name: 'Produto 3', price: 14.99, image: '' },
      { name: 'Produto 4', price: 24.99, image: 'https://images.immediate.co.uk/production/volatile/sites/30/2023/01/Shirley-temple-1e55cf0.jpg?quality=90&resize=556,505' },
    ],
  },{
  id: 4,
  items: [
    { name: 'Produto 5', price: 9.99, image: 'https://www.acouplecooks.com/wp-content/uploads/2020/05/Clover-Club-Cocktail-006.jpg' },
    { name: 'Produto 6', price: 19.99, image: 'https://www.acouplecooks.com/wp-content/uploads/2021/05/Strawberry-Mojito-008.jpg' },
  ],
  },
  // Adicione mais produtos aqui...
];
  const renderCartItem = ({ item }) => (
    <View style={styles.card}>
      <Image source={{ uri: item.image }} style={styles.image} />
      <Text style={styles.name}>{item.name}</Text>
      <Text style={styles.price}>R$ {item.price.toFixed(2)}</Text>
    </View>
  );
  const renderProduct = ({ item }) => (
    <View style={styles.cardContainer}>
      {item.items.map((product) => (
        <View key={product.name} style={styles.card}>
          <Image source={{ uri: product.image }} style={styles.image} />
          <Text style={styles.name}>{product.name}</Text>
          <Text style={styles.price}>{product.price.toFixed(2)} €</Text>
          <TouchableOpacity style={styles.button}>
        <Text style={styles.buttonText}>Remover do carrinho</Text>
      </TouchableOpacity>
        </View>
      ))}
    </View>
  );
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Carrinho</Text>
      {cartItems.length === 0 ? (
        <Text style={styles.emptyText}>Seu carrinho está vazio.</Text>
      ) : (
        <FlatList
          data={cartItems}
          renderItem={renderProduct}
          keyExtractor={(item) => item.id.toString()}
          contentContainerStyle={styles.list}
        />
      )}
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
  emptyText: {
    fontSize: 16,
    fontStyle: 'italic',
    textAlign: 'center',
  },
  cardContainer: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    marginBottom: 10,
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

export default CartScreen;
