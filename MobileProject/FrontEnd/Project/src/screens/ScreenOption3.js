
import React from "react";
import { Button, Actionsheet, useDisclose, InfoIcon } from "native-base";
import { View, Text, StyleSheet } from 'react-native';
import Iconicons from '@expo/vector-icons/Ionicons';

const ActionS = ({navigation}) => {
    const { isOpen, onOpen, onClose } = useDisclose();
    return <>
        <View style={{ flex: 1, justifyContent: 'center' }}>
            <Text style={[styles.text]}>Action Sheet</Text>

            <Button onPress={onOpen}>Options</Button>

            <Actionsheet isOpen={isOpen} onClose={onClose}>
                <Actionsheet.Content>
                    <Actionsheet.Item onPress={() => alert("Presionaste opción 1") }>Option 1</Actionsheet.Item>
                    <Actionsheet.Item onPress={() => alert("Presionasite opcion 2")}>Option 2</Actionsheet.Item>
                    <Actionsheet.Item onPress={() => navigation.navigate(screen.main)}>Go to home</Actionsheet.Item>
                </Actionsheet.Content>
            </Actionsheet>
        </View>
    </>
}

const styles = StyleSheet.create({
    text: {
        textAlign: 'center',
        fontSize: 20,
        fontWeight: 'bold',
        marginBottom: 12,
    },
});

export default ActionS;
