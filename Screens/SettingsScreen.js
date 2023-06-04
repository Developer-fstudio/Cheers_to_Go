import {  StyleSheet,Text, View } from 'react-native';
import { useNavigation } from '@react-navigation/native';


const SettingsScreen = () => {
    const navigation = useNavigation();
    return(
        <View style={styles.screenView}>
            <Text style={styles.screenText}>SettingsScreen</Text>
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
    }
});

export default SettingsScreen;
