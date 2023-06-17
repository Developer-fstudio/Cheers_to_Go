import React, {useState} from 'react';
import { StyleSheet, Text, View, Button } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import SettingsScreen from './Screens/SettingsScreen';
import HomeScreen from './Screens/HomeScreen';
import ProductScreen from './Screens/ProductScreen';
import CartScreen from './Screens/CartScreen';




const Stack = createNativeStackNavigator();


const App = () => {
    return (
        <NavigationContainer>
                <Stack.Navigator>
                <Stack.Screen name='Home' component={HomeScreen} />
                <Stack.Screen name='Setting' component={SettingsScreen} />
                <Stack.Screen name='Products' component={ProductScreen} />
                <Stack.Screen name='Cart' component={CartScreen} />
            </Stack.Navigator>
        </NavigationContainer>
    )
}

const styles = StyleSheet.create({
    homeView: {
        flex:1,
        justifyContent:'center',
        alignItems:'center',
    },
    homeText: {
        marginBottom:10,
        fontSize:20,
    },
    screenView: {
        flex:1,
        justifyContent:'center',
        alignItems:'center',
    },
    screenText: {
        fontSize:20,
    }
});

export default App;
