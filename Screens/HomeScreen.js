import {  StyleSheet,Text, View, Button } from 'react-native';
import { useNavigation } from '@react-navigation/native';

const HomeScreen = ({ navigation }) => {

    return (
        <View style={styles.homeView}>
            <Text style={styles.homeText}>HomeScreen</Text>
            <Button
                title='go to setting screen'
                onPress={() => navigation.navigate('Setting' )}
            />
        <Button style={styles.button}
			title='go to setting Products'
			onPress={() => navigation.navigate('Products' )}

		/>
        <Button style={styles.button}
			title='go to setting Products'
			onPress={() => navigation.navigate('Cart' )}

		/>
        </View>
    );
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
    },
	button: {
        fontSize:20,
        paddingTop:100,
    }
});

export default HomeScreen;

