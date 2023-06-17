import {  StyleSheet,Text, View, Button } from 'react-native';
import { useNavigation } from '@react-navigation/native';
import { HeaderTitle } from '@react-navigation/stack';
import { Ionicons } from '@expo/vector-icons';

const HomeScreen = ({ navigation }) => {
    const [showDropdown, setShowDropdown] = useState(false);

    const handleAccountPress = () => {
        setShowDropdown(!showDropdown);
      };

      const renderHeaderTitle = () => {
        return (
          <TouchableOpacity onPress={handleAccountPress} style={styles.accountContainer}>
            <Ionicons name="person" size={24} color="#fff" style={styles.accountIcon} />
            <Text style={styles.accountText}>Conta</Text>
          </TouchableOpacity>
        );
      };
    return (

        <View style={styles.homeView}>
             <View style={styles.container}>
      <HeaderTitle style={styles.headerTitle} children={renderHeaderTitle} />
      {showDropdown && (
        <View style={styles.dropdown}>
          <Text style={styles.dropdownText}>Opção 1</Text>
          <Text style={styles.dropdownText}>Opção 2</Text>
          <Text style={styles.dropdownText}>Opção 3</Text>
        </View>
      )}
    </View>
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
			title='go to setting Cart'
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
        paddingBottom:100,
    }, container: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
      },
      headerTitle: {
        flexDirection: 'row',
        alignItems: 'center',
      },
      accountContainer: {
        flexDirection: 'row',
        alignItems: 'center',
      },
      accountIcon: {
        marginRight: 4,
      },
      accountText: {
        fontSize: 18,
        color: '#fff',
      },
      dropdown: {
        position: 'absolute',
        top: 60,
        right: 10,
        backgroundColor: '#fff',
        borderRadius: 4,
        padding: 8,
        elevation: 4,
      },
      dropdownText: {
        fontSize: 16,
        marginBottom: 8,
      },
});

export default HomeScreen;

